<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Log;

class SendSubEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send {post}';

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

        $user = \App\Models\Subscriber::where('website_id', $post['$post']['website_id'])->first();
        Log::info('good');

        $data = ['name'=> "Sender Name", "body" => $post['$post']['description']];


        Mail::raw($post['$post']['content'], function ($message) use($user, $post) {
            $message->from('rashid@test.com', 'Rashid');
            $message->to($user->email, $user->name);
            $message->subject($post['$post']['title']);
        });
        $this->info('The email send successfully!');
    }
}