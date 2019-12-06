<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VUserlogz extends Model
{
    protected $table = 'userlog';
    protected $fillable = [ 'npk' , 'nama' , 'job' , 'cabang' , 'wilayah' , 'report_tittle' , 'access_at' ];
    //protected $increment = false;
}
