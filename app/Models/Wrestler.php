<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Wrestler extends Model
{
    use HasFactory;

    public string $name;

    protected $fillable = ['name'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'wrestler_category');
    }
}
