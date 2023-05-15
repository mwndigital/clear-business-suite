<?php

namespace App\Models\Admin;

use App\Models\ProjectMilestone;
use App\Models\ProjectNotes;
use App\Models\ProjectTasks;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProject extends Model
{

    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'project_type',
        'project_status',
        'billing_type',
        'estimated_hours',
        'rate_per_hour',
        'total_rate',
        'start_date',
        'due_date',
        'description',
        'user_id',
        'project_notes_id',
        'project_tasks_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function tasks() {
        return $this->hasMany(ProjectTasks::class);
    }
    public function notes() {
        return $this->hasMany(ProjectNotes::class);
    }
    public function milestones(){
        return $this->hasMany(ProjectMilestone::class);
    }
}
