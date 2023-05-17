<?php

namespace App\Models\Admin;

use App\Models\ProjectMilestone;
use App\Models\ProjectTasks;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTimeTracking extends Model
{
    use HasFactory;

    protected $table = 'project_time_tracking';
    protected $fillable = [
        'project_id',
        'task_id',
        'milestone_id',
        'staff_id',
        'client_id',
        'start_time',
        'end_time',
        'time_spent',
        'total',
        'notes',
        'billed'
    ];

    public function project(){
        return $this->belongsTo(AdminProject::class);
    }
    public function task(){
        return $this->belongsTo(ProjectTasks::class);
    }
    public function milestone(){
        return $this->belongsTo(ProjectMilestone::class);
    }
    public function staff(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
}
