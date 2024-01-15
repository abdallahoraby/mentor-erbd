<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use function env;
use function route;

class Send extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $content;
    public function __construct($notification)
    {
       $this->notification = $notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if (env('APP_ENV') === 'local') {
            return ['database'];

        }

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
            ->markdown('mail.send', ['content' => $this->content]);
    }

    public function toDatabase($notifiable)
    {

        return [
            'action'=> 'send',
            'model'=> 'notifications',
            'title'=>$this->notification->title,
            'desc'=>$this->notification->content,
            'url' =>$this->notification->url,
        ];
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
