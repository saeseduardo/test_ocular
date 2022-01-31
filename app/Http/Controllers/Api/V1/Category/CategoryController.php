<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Categorycontroller extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create(CategoryCreateRequest $request)
    {
        try {
            $category = $this->categoryService->create($request);
            return $this->resopnseCreated('Category created!', $category);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function list()
    {
        try {
            $categories = $this->categoryService->list();
            return $this->resopnseOk('List of category!', $categories);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function delete(Category $category)
    {
        try {
            $this->categoryService->delete($category);
            return $this->resopnseOk('Category deleted!', []);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
