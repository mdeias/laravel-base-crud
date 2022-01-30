<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fumetto extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type'
    ];
}
