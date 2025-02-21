<?php
namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentalInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;

    /**
     * Create a new message instance.
     *
     * @param Rental $rental
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Rental Invoice')
            ->view('emails.rental_invoice')
            ->to($this->rental->user->email)    // Send to the customer
            ->cc(config('mail.admin_address')); // Send a copy to the admin
    }
}
