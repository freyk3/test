<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','item_id');
    }
}
