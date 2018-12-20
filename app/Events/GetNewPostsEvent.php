<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\models\postModel;

class GetNewPostsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    public function __construct()
    {
        //
    }

    public function broadcastOn()
    {
        return new Channel('postUpdate');
    }

    public function broadcastWith()
    {
        $postModel = new postModel();
        return [
            'posts' => $postModel->getLastPosts(),
        ];
    }
}