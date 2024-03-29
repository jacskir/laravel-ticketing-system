<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket',
        'assignee_notes',
        'status',
    ];

    public function assignee()
    {
        return $this->belongsTo(User::class);
    }

    public function assigner()
    {
        return $this->belongsTo(User::class);
    }
}
