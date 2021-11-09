<?php

namespace App\Http\Controllers\Api;

use App\Events\PostCreated;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Website $website, Request $request)
    {
        $this->authorize('create-post', $website);

        $request->validate([
            'title' => 'required|string|min:1',
            'body' => 'required|min:1',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'created_by' => $request->user()->id,
            'website_id' => $website->id,
        ]);

        // fire post created event
        event(new PostCreated($post));

        return response()->json([
            'message' => 'Post created successfully',
        ], 201);
    }
}
