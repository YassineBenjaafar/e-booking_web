<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Booking;

class BookingNotification extends Notification
{
    use Queueable;

    protected $booking ;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking ;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->view('espace_client.notification.mail',
                ['booking' => $this->booking]);           
    }

    public function toArray($notifiable)
    {
        return [];
    }

    public function toDatabase(){
        return [
            'booking' => $this->booking
        ];
    }
}
