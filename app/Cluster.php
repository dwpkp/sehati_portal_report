<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'cluster';
    protected $fillable = ['cluster_id','dw_id', 'cluster_nm', 'cluster_status'];
    public $timestamp = false;
    protected $increment = false;
}
