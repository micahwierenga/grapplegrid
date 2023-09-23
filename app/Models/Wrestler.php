<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wrestler extends Model
{
    use HasFactory;

    public string $name;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
