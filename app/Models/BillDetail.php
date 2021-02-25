<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $guarded = [];

    public function bills(){
        return $this->hasOne('App\Models\Bill', 'id');
    }
    public function user(){
        return $this->belongTo('App\User');
    }
}
