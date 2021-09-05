<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Ticket;
use Auth;
use Carbon\Carbon;

class ReplyTicketNotification extends Notification
{
    use Queueable;

    protected $ticket;
    protected $sujet;
    protected $message;

    public function __construct(Ticket $ticket , $subject , $message)
    {
        $this->ticket = $ticket;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('following your claim under ticker reference : '.$this->ticket->id)
                    ->line($this->subject)
                    ->line($this->message)
                    ->line("Thank you for using our services.");
    }

    public function toArray($notifiable)
    {
        return [];
    }

    public function toDatabase(){
        return [
            'client_id' => $this->ticket->client->id,
            'client_fullName' => $this->ticket->client->fullName,
            'client_subject' => $this->ticket->subject,
            'client_message' => $this->ticket->message,
            'admin_id' => Auth::guard('admin')->user()->id,
            'admin_fullName' => Auth::guard('admin')->user()->fullName,
            'admin_reply_subject' => $this ->subject,
            'admin_reply_message' => $this->message,
            'reply_time' => Carbon::now(),
        ];
    }
}
