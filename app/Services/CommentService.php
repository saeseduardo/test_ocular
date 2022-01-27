<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;

class CommentService
{
    public function add($post, $comment)
    {
        Comment::create([
            'comment' => $comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);
        return Post::with(['category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user'])->where('id', $post->id)->first();
    }

    public function delete($post)
    {
        Comment::where('user_id', auth()->user()->id)->where('post_id', $post->id)->delete();
        return Post::with(['category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user'])->where('id', $post->id)->first();
    }
}
