<?php

namespace App\Mainframe\Jobs;

use App\PushNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobSendPushNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 30;

    /**
     * @var PushNotification
     */
    public $pushNotification;

    /**
     * Create a new job instance.
     *
     * @param  PushNotification  $pushNotification
     */
    public function __construct($pushNotification)
    {
        //
        $this->pushNotification = $pushNotification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /******************************************
         * Prepare data
         ******************************************/
        $data = [
            'content_available' => true,
            'priority'          => 'high',
            'to'                => $this->pushNotification->device_token,
            //'registration_id' => $this->pushNotification->device_token, // Use for sending single push on Multiple devices
            'notification'      => [
                'title'  => $this->pushNotification->name,
                'body'   => $this->pushNotification->body,
                'sound'  => 'Default',
                'image'  => 'Notification Image',
                'action' => 'home_screen',
                'badge'  => 1,
                'data'   => $this->pushNotification->data,
            ],

            'data' => json_decode($this->pushNotification->data, 1)//{"purchase_id":325,"partner_id":66,"partner_name":"....}
        ];

        /******************************************
         * Make the API call
         ******************************************/
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => [
                "authorization: Key=".env('PUSH_NOTIFICATION_AUTHORIZATION'),
                "cache-control: no-cache",
                "content-type: application/json",
            ],
        ]);

        $response = curl_exec($curl);
        /* Process $content here */

        // Close curl handle
        curl_close($curl);

        /******************************************
         * Update database based on response
         ******************************************/
        $response = json_decode($response);
        if (isset($response->multicast_id)) {
            # Update DB with results
            \DB::table('push_notifications')->where('id', $this->pushNotification->id)->update([
                'multicast_id'  => $response->multicast_id,
                'success_count' => $response->success,
                'failure_count' => $response->failure,
                'api_response'      => json_encode($response),
            ]);
        }

    }
}