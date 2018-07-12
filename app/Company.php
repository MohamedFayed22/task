<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table ='companies';
    protected $fillable = ['id', 'name', 'phone', 'address', 'field', 'visites_date', 'country_id','branches'];



    public function email()
    {
        return $this->belongsTo('App\Email','id','company_id');
    }




}
