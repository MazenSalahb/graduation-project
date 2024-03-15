<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBook extends Notification
{
    use Queueable;
    private $postId;
    private $userName;
    private $image;
    private $title;

    /**
     * Create a new notification instance.
     */
    public function __construct($postId, $userName, $title, $image)
    {
        $this->postId = $postId;
        $this->userName = $userName;
        $this->title = $title;
        $this->image = $image;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'postId' => $this->postId,
            'image' => $this->image,
            'userName' => $this->userName,
            'title' => 'New book added: ' . $this->title,
        ];
    }
}
