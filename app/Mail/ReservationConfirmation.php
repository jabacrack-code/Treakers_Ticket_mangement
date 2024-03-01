<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $eventTitle;

    /**
     * Create a new message instance.
     *
     * @param  string  $eventTitle
     * @return void
     */
    public function __construct($eventTitle)
    {
        $this->eventTitle = $eventTitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reservation Confirmation')
                    ->view('emails.reservation_confirmation')
                    ->with('eventTitle', $this->eventTitle); // Pass the eventTitle variable to the view
    }
}
