<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\LikeService;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function add(Post $post)
    {
        try {
            $post = $this->likeService->add($post);
            return $this->resopnseOk('Category deleted!', $post);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
