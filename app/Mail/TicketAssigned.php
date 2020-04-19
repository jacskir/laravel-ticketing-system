<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketAssigned extends Mailable
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
        return $this->markdown('emails.ticket_assigned')
            ->subject('Ticket assigned by ' . $this->assignerName);
    }
}
