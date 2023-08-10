<?php

namespace App\Notifications\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;
    private $notifyData;
    // private $ReviewInfo;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->notifyData = $request;
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
        // ['mail','database'] // this will sent together into gmail and notifications database table setup
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // this is for email , not for database table data
        return (new MailMessage)
        ->line('The introduction to the notification.')
        ->action('Notification Action', url('/'))
        ->line('Thank you for using our application!');
/*         ->subject('News Review Notification')
        ->line($this->notifyData['content'])
        ->action($this->notifyData['noticeText'], $this->notifyData['noticeUrl'])
        ->line($this->notifyData['thanks']); */
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
            'message'=>"New Comment added on the News",
            // 'reviewText'=>$this->ReviewInfo,
            'notifiable'=> $notifiable,
        ];
    }
}
