<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class SendSubEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send {post} {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subsribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = $this.argument('post');
        $user = $this.argument('user');
        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to($user->email, $post->title)->subject
                ($post->description);
            $message->from('xyz@gmail.com','Rashid Obaidi');
        });
        $this->info('The email send successfully!');
    }
}