<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBillingType extends Model
{
    use HasFactory;

    protected $table = 'project_billing_types';

    protected $fillable = [
        'name'
    ];
}
