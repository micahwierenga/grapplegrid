<?php

namespace App\Models;

use App\Models\Wrestler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public string $name;
    public string $slug;

    protected $fillable = ['name', 'slug'];

    public function wrestlers(): BelongsToMany
    {
        return $this->belongsToMany(Wrestler::class, 'wrestler_category');
    }
}
