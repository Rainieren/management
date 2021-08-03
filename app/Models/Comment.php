<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'message'
    ];

    /**
     * Get the parent commentable model (issue or ticket).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the issues that are assigned this comment.
     */
    public function issues()
    {
        return $this->morphedByMany(Issue::class, 'commentable');
    }

    /**
     * Get all of the tickets that are assigned this comment.
     */
    public function tickets()
    {
        return $this->morphedByMany(Ticket::class, 'commentable');
    }

    /**
     * Get the user that is assigned to this comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
