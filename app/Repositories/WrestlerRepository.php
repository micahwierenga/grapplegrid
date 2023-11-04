<?php

namespace App\Repositories;

use App\Models\Wrestler;
use App\Repositories\Contracts\WrestlerRepository as WrestlerRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class WrestlerRepository implements WrestlerRepositoryContract
{
    public function getAllWrestlers(): Collection
    {
        return Wrestler::all();
    }
}
