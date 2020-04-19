<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $ticketid;
    public $assigneeName;
    public $assignerName;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $ticketid, string $assigneeName, string $assignerName)
    {
        $this->ticketid = $ticketid;
        $this->assigneeName = $assigneeName;
        $this->assignerName = $assignerName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ticket_closed')
            ->subject('Ticket closed by ' . $this->assigneeName);
    }
}
