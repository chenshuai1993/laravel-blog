<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Blog;

class BlogInit
{
    public $blog;

    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * 创建一个事件实例。
     *
     * @param  Blog  $blog
     * @return void
     */
    public function __construct(Blog $blog)
    {
        //
        $this->blog = $blog;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
