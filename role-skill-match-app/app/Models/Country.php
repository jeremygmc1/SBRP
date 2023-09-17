<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    // One-to-many relationship with `Staff` model
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }

    // One-to-many relationship with `Role` model
    public function role(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}