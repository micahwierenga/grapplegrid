<?php

namespace App\Models;

use App\Models\Wrestler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public string $name;

    public function wrestlers()
    {
        return $this->belongsToMany(Wrestler::class);
    }
}
