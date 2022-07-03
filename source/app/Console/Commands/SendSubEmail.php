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
    protected $signature = 'emails:send {post} {--user}';

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
        $post = $this->argument('post');
        //log to see if it works
        Log::debug(json_encode($post));
        $user = \App\Models\Subscriber::where('website_id', $post['website_id'])->first();

        $data = ['name'=> "Sender Name", "body" => $post->description];

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to($user->email, $user->name)->subject
                ($post->title);
            $message->from('xyz@gmail.com','Rashid Obaidi');
        });
        $this->info('The email send successfully!');
    }
}