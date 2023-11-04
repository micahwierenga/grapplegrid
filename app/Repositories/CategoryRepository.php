<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository as CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryContract
{
    public function getCategoriesBySlugs(array $slugs): Collection
    {
        return Category::whereIn('slug', $slugs)->select('name', 'slug')->get()->keyBy('slug');
    }
}
