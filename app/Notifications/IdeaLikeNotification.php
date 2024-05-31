<?php

namespace App\Notifications;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeaLikeNotification extends Notification
{
    use Queueable;

    private $idea;

    /**
     * Create a new notification instance.
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; // or you can use 'mail' if you want to send via email
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
            // return the idea and authenticated user details
            'liker_id' => auth()->user()->id,
            'liker_name' => auth()->user()->name,
            'idea_id' => $this->idea->id,
            'idea_content' => $this->idea->content,
        ];
    }

        /**
     * Mark notification as read
     *
     * @param Idea $id
     * @return void
     */
    public function markAsRead($id)
    {
        if ($id) {
            auth()->user()->notifications()->where('id', $id)->first()->markAsRead();
        }

        return back();
    }
}