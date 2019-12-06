<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = ['role_id', 'role_nm', 'role_status', 'role_start_date', 'role_end_date', 'created_at', 'role_created_by', 'updated_at', 'role_modified_by'];
    public $timestamp = false;
    protected $increment = false;
}
