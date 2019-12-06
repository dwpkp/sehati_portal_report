<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = ['report_id', 'report_nm', 'cluster_id', 'report_desc', 'report_status', 'report_url', 'parent_menu','created_at','updated_at'];

}
