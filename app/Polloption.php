<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polloption extends Model
{
    public function Poll() {
        return $this->belongsTo('App\Poll');
    }

    public function UserVote() {
        return $this->hasMany('App\Vote');
    }
}
