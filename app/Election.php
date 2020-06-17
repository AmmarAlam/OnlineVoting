<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public function candidate()
    {
        return $this->hasMany('App\Candidate');
    }

    public function voter()
    {
        return $this->hasMany('App\Voter');
    }
}
