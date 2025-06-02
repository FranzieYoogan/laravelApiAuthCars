<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Car extends Model
{
    protected $fillable = [

        'make',
        'model',
        'year',
        'color',
        'price',
        'image',
        'stock',
        'description',

    ];

    public function user() {

        return $this->belongsTo(User::class);

    }
}
