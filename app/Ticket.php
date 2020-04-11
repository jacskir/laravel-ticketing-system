<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket',
        'status',
    ];

    public function assignee()
    {
        return $this->belongsTo(User::class);
    }
}
