<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $guarded = [];
    public function product()
    {
        return $this->hasOne('App\Models\Backend\Product', 'id', 'id');
    }
}
