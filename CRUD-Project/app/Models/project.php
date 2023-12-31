<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'tb_m_project';
    protected $fillable = ['project_name','client_id','project_start','project_end','project_status'];
    protected $dates = ['project_start','project_end'];
    protected $primaryKey = 'project_id';
    public $timestamps = false;
}
