<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Post;

class PostService
{
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function create($data)
    {
        $post = new Post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category'];
        $post->user_id = auth()->user()->id;
        $post->save();

        $file = $this->photoService->upload($data['photo'], $post);

        $data = [
            'url' => $file->dirname . '/' . $file->basename,
            'post_id' => $post->id
        ];

        $this->photoService->create($data);

        return $post->load('category', 'user', 'photo');
    }

    public function list()
    {
        return Post::with(['category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user'])->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function detail($post)
    {
        return $post->load('category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user');
    }

    public function update($data, $post)
    {
        $post->update([
            'title' => $data['title'],
            'conetent' => $data['conetent'],
            'category_id' => $data['category_id']
        ]);

        return $post->load('category', 'user', 'photo', 'likes', 'likes.user', 'comments', 'comments.user');
    }

    public function delete($post)
    {
        $post->delete();
        return $this->list();
    }
}
