<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Http\Helpers\Notification as FcmNotification;

class ReservationStatus extends Notification
{
    use Queueable;

    private $title, 
            $message,
            $reservation_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $message, $reservation_id)
    {
        $this->title = $title;
        $this->message = $message;
        $this->reservation_id = $reservation_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

        
    public function toDatabase($notifiable){

        $data =  [
            "title"      => $this->message,
            "user"       => $notifiable->name,
            "order_id"   => $this->reservation_id
        ];

        FcmNotification::sendFCMNotification($this->title, $this->message, $notifiable->device_key);

        return $data;
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
}
