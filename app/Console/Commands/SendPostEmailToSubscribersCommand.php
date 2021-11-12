<?php

namespace App\Console\Commands;

use App\Jobs\SendPostEmailToSubscriber;
use App\Models\Post;
use Illuminate\Console\Command;

class SendPostEmailToSubscribersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:post {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to all subscribers for a given post id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post_id = $this->argument('post_id');

        $post = Post::where('id' ,$post_id)->first();
        if (!$post) {
            $this->error("Post not found with given ID");
            return Command::FAILURE;
        }

        // get all subscribers
        $websiteSubscribers = $post->website->subscribers()->cursor();
        foreach ($websiteSubscribers as $subscriber) {
            SendPostEmailToSubscriber::dispatch($post, $subscriber);
        }

        $this->info("Sending email for post queued successfully");
        return Command::SUCCESS;
    }
}
