<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use LaravelAndVueJS\Traits\LaravelPermissionToVueJS;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable, HasRoles, LaravelPermissionToVueJS;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'street_name',
        'street_number',
        'postal_code',
        'city',
        'state',
        'country_id',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The issues that belong to the user.
     */
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }

    /**
     * The projects that belong to the user.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * The issues that belong to the user.
     */
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }

    /**
     * The team that the user belongs to
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * The comments that the user belongs to
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
