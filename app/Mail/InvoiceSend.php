<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Stripe\Invoice;

class InvoiceSend extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, User $user)
    {
        $this->invoice = $invoice;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@management.com')
            ->subject('A new invoice from ' . env('APP_NAME') . " is ready to be paid.")
            ->markdown('emails.invoices.invoiceSent');
    }
}
