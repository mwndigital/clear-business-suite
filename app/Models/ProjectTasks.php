<?php

namespace App\Models;

use App\Models\Admin\AdminProject;
use App\Models\Admin\ProjectTimeTracking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTasks extends Model
{
    use HasFactory;

    protected $table = 'project_tasks' ;

    protected $fillable = [
        'title',
        'start_date',
        'due_date',
        'priority',
        'description',
        'project_id'
    ];

    public function project() {
        return $this->belongsTo(AdminProject::class);
    }
    public function timeTracking(){
        return $this->hasMany(ProjectTimeTracking::class);
    }
}
