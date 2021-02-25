<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function author()
    {
        return $this->belongsTo('App\Models\Backend\Author');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Backend\Category');
    }
    public function detailProduct()
    {
        return $this->hasOne('App\Models\Backend\DetailProduct', 'id', 'id');
    }
    public function bills()
    {
        return $this->belongsToMany('App\Models\Bill');
    }
    public function publisher()
    {
        return $this->belongsTo('App\Models\Backend\Publisher');
    }
}
