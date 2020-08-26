<?php

namespace App\Projects\MyProject\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Projects\MyProject\Modules\Invoices\Invoice;

class EmailToAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The invoice instance.
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice) {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('projects.my-project.emails.send-invoice-admin')
            ->subject('Request for Invoice')
            ->with(['invoice' => $this->invoice]);
    }
}