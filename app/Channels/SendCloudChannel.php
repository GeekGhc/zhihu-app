<?php


namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendCloudChannel
{
    public function send($notifiable,Notification $notification)
    {
        $message = $notification->toSendCloud($notifiable);
    }
}