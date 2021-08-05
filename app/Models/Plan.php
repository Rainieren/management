<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'stripe_plan_id'];
}
