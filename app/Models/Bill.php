<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Models\Backend\Product');
    }
    public function detailBill()
    {
        return $this->hasOne('App\Models\BillDetail', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
