<?php

namespace App\Models;

use App\Models\Admin\AdminProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectNotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'the_content',
        'show_to_client',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(AdminProject::class);
    }
}
