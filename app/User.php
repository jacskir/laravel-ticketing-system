<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * The tickets that the user has been assigned to
     */
    public function assigneeTickets()
    {
        return $this->hasMany(Ticket::class, 'assignee_id');
    }

    /**
     * The tickets that the user has assigned
     */
    public function assignerTickets()
    {
        return $this->hasMany(Ticket::class, 'assigner_id');
    }
}
