<?php

namespace Caronae\Notifications;

use Caronae\Channels\PushChannel;
use Caronae\Models\Ride;
use Caronae\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RideJoinRequested extends Notification
{
    use Queueable;

    protected $ride;
    protected $requester;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ride $ride, User $requester)
    {
        $this->ride = $ride;
        $this->requester = $requester;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', PushChannel::class];
    }

    /**
     * Get the mobile push representation of the notification.
     *
     * @param  User  $notifiable
     * @return array
     */
    public function toPush($notifiable)
    {
        return [
            'message' => $this->message->body,
            'rideId' => $this->message->ride_id,
            'msgType' => 'chat',
            'senderName' => $this->message->user->name,
            'senderId' => $this->message->user->id,
            'time' => $this->message->date->toDateTimeString()
        ];
    }
}
