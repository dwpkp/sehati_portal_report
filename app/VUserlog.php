<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VUserlog extends Model
{
    protected $table = 'userlog';
    protected $fillable = ['npk','nama','cabang','report','nama_report','waktu_buka_report'];
    protected $increment = false;
}
