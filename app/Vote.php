<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'uservotes';

    public function Polloption() {
        return $this->belongsTo('App\Polloption');
    }
}
