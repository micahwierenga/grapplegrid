<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    public function getCategoriesBySlugs(array $slugs);
}
