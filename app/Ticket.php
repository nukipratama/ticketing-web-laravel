<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   public function books()
   {
      return $this->hasMany('App\Book', 'ticket_id', 'id');
   }
}
