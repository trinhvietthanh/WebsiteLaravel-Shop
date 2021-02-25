<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany('App\Models\Backend\Product');
    }
}
