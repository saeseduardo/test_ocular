<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(Request $request)
    {
        try {
            $post = $this->postService->create($request);
           return $this->resopnseCreated('Post created!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function list()
    {
        try {
            $post = $this->postService->list();
            return $this->resopnseOk('List of post!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function detail(Post $post)
    {
        try {
            $post = $this->postService->detail($post);
            return $this->resopnseOk('Post deleted!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function update(PostCreateRequest $request, Post $post)
    {
        try {
            $postUpdated = $this->postService->update($request, $post);
            return $this->resopnseOk('Post edited!', $postUpdated);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function delete(Post $post)
    {
        try {
            $post = $this->postService->delete($post);
            return $this->resopnseOk('Post deleted!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
