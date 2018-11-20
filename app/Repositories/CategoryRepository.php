<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository
{
    public function getModel()
    {
        return Category::class;
    }

    public function categoryFirst($category)
    {
        return $this->model->where('id', '=', $category)->first();
    }

    public function pluckCategory()
    {
        return $this->model->where('parent_id', '=', config('custom.zero'))->pluck('name', 'id')->prepend('Choose a Category ', '');
    }
}
