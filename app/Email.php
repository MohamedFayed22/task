<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table ='emails';
    protected $fillable = ['email','company_id'];



    public function country()
    {
        return $this->hasMany('App\Country','id','company_id');
    }
}
