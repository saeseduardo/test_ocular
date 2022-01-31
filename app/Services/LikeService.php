<?php

namespace App\Services;

use App\Models\Like;
use App\Models\Post;

class LikeService
{
    public function add($post)
    {
        $userIsLiked = Like::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();

        if(!$userIsLiked) {
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $post->id
            ]);
            return Post::with(['category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user'])->where('id', $post->id)->first();
        }
    }

    public function delete($post)
    {
        Like::where('user_id', auth()->user()->id)->where('post_id', $post->id)->delete();
        return Post::with(['category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user'])->where('id', $post->id)->first();
    }
}
