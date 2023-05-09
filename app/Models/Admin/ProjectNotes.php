<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectNotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'the_content',
    ];

    public function projectNote() {
        return $this->belongsTo(AdminProject::class);
    }
}
