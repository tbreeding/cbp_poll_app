<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function options() {
        return $this->hasMany('App\Polloption');
    }

    public function User() {
        return $this->belongsTo('App\User');
    }
}
