<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'bid',
        'jenis',
        'kategori',
        'harga',
        'jumlah',
        'email'
    ];
}
