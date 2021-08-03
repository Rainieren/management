<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the ticket.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
