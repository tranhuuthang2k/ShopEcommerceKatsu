<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
   protected $fillable = [
        'name',
        'price',
        'descripsion',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
