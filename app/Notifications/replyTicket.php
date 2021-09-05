<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Ticket;
use Auth;
use Carbon\Carbon;

class replyTicket extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $ticket;
    protected $sujet;
    protected $message;
    public function __construct(Ticket $ticket , $sujet , $message)
    {
        $this->ticket = $ticket;
        $this->sujet = $sujet;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Suite a votre declaration sous le numéro de ticket '.$this->ticket->id)
                    ->line($this->sujet)
                    ->line($this->message)
                    ->line("Merci d'avoir utilisé notre service!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase(){
        return [
            'client_id' => $this->ticket->client->id,
            'client_name' => $this->ticket->client->name,
            'client_sujet' => $this->ticket->sujet,
            'client_message' => $this->ticket->message,
            'admin_id' => Auth::guard('admin')->user()->id,
            'admin_name' => Auth::guard('admin')->user()->name,
            'admin_reply_sujet' => $this ->sujet,
            'admin_reply_message' => $this->message,
            'reply_time' => Carbon::now(),
        ];
    }
}
