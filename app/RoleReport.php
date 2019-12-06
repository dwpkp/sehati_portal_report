<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleReport extends Model
{
    protected $table = 'role_report';
    protected $fillable = ['role_report_id', 'role_id', 'report_id'];

}
