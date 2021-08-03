<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'user_id'
    ];

    /**
     * Get all of the comments for the issue.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
