<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateRequest;
use App\Models\Post;
use App\Services\CommentService;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function add(CommentCreateRequest $request, Post $post)
    {
        try {
            $post = $this->commentService->add($post, $request->comment);
            return $this->resopnseOk('Comment added!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function delete(Post $post)
    {
        try {
            $post = $this->commentService->delete($post);
            return $this->resopnseOk('Comment deleted!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
