<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = [];
    protected $table = 'uservotes';

    public function Polloption() {
        return $this->belongsTo('App\Polloption');
    }
    public function user() {
        return $this->belongsToMany('App\User');
    }
}
