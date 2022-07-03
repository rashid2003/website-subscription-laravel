<?php

namespace App\Observers;

use App\Models\Post;
use Mail;
use Queue;
class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $users = \App\Models\Subscriber::where('website_id', $post->website_id)->get();
        foreach($users as $user) {
            Queue::push(new \App\Jobs\SendSubEmail(['$post' => $post]));
        }  
    }    
}