<?php

namespace App\Mainframe\Helpers;

class ResponseBuilder
{
    /** @var string */
    public $status;
    public $code;
    public $message;
    public $payload;

    public function __construct()
    {
        $this->status = 'success';
    }

    /**
     * ret()
     *
     * @param  null  $status
     * @param  null  $message
     * @param  array  $merge
     * @return array
     */
    public static function generate($status = null, $message = null, $merge = [])
    {
        $response = [
            'status'  => $status,
            'message' => $message,
        ];

        return array_merge($response, $merge);

    }

    public function success($message = 'Operation successful', $code = 200)
    {
        if ($this->status !== 'fail') {
            $this->status  = 'success';
            $this->code    = $code;
            $this->message = $message;
        }

        return $this;
    }

    public function fail($message = 'Operation failed', $code = 404)
    {
        if ($this->status !== 'fail') {
            $this->status  = 'fail';
            $this->code    = $code;
            $this->message = $message;
        }

        return $this;
    }

}