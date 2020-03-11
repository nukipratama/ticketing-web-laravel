<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'bid',
        'ticket_id',
        'jumlah',
        'email'
    ];
    public function tickets()
    {
        return $this->hasOne('App\Ticket', 'id', 'ticket_id');
    }
    public function participants()
    {
        return $this->hasMany('App\Participant', 'bid', 'bid');
    }
}
