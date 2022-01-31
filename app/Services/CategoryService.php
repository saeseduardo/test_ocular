<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function create($data)
    {
        return Category::create($data->all());
    }

    public function delete($category)
    {
        return $category->delete();
    }

    public function list()
    {
        return Category::select('id', 'name')->get();
    }
}
