<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(PostCreateRequest $request)
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
}
