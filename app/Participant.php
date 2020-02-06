<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'uid', 'bid', 'email', 'address', 'tel', 'emergency', 'gender', 'birthdate', 'identity', 'community', 'size', 'img', 'medical'
    ];
}
