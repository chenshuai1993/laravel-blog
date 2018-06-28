<?php

namespace App\Listeners;

use App\Events\BlogInit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;


class BlogRead
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 处理事件
     *
     * @param  BlogInit  $event
     * @return void
     */
    public function handle(BlogInit $event)
    {
        //$event->blog  来访问 blog
        //print_r();

        $event->blog->increment('readed_sum');
        Log::info('博客访问次数'.$event->blog->readed_sum);

    }
}
