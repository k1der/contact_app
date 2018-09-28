<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;

use Validator;

class Contact extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function addresses() {
        return $this->hasMany('App\Address');
    }
}
