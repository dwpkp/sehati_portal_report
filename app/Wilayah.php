<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'dept_wil';
    protected $fillable = ['dw_id', 'dw_nm', 'dw_status', 'created_at', 'updated_at'];
    public $timestamp = false;
    protected $increment = false;
}
