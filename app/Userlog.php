<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    protected $table = 'userlog';
    protected $fillable = [ 'npk' , 'nama' , 'job' , 'cabang' , 'wilayah' , 'report_tittle' , 'access_at' ];
    //public $timestamp = false;
    //protected $increment = false;
}
