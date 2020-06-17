<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = ['user_id','cnic','election_id'];

    public function election()
    {
        //if same function 'election' used in another model
        // without 'id' not work in this model='Voter'
        return $this->belongsTo('App\Election', 'id');
    }
}
