<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employess';
    protected  $fillable = ['name','job_title','email','mobile','nationality'];

    public $timestamps = false;

}
