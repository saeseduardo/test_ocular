<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostService
{
    public function create($data)
    {
        $post = new Post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return $post->load('category', 'user');
    }

    public function list()
    {
        return Post::with(['category', 'user'])->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function update($data, $post)
    {
        $post->update([
            'title' => $data['title'],
            'conetent' => $data['conetent'],
            'category_id' => $data['category_id']
        ]);

        return $post->load('category', 'user');
    }

    public function delete($category)
    {
    }
}
