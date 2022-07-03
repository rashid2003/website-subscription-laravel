<?php

namespace App\Observers;

use App\Models\Post;
use Mail;
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
        $users = Subscriber::where('website_id', $post->website_id)->get();
        foreach($users as $user) {
            $data = [
                'post' => $post,
                'user' => $user
            ];
            Queue::push(new SendSubEmail($data));
        }  
    }    
}