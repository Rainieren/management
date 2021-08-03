<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The team that the user belongs to
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
