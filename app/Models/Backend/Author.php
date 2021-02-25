<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    public $timestamps = false;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany('App\Models\Backend\Product');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Backend\Category', 'author_category', 'id', 'id');
    }

}
