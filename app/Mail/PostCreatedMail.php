<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable implements  ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Post
     */
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.created', [
            'title' => $this->post->title,
            'body' => $this->post->body
        ])->subject("New Post created for website ".$this->post->website->name);
    }
}
