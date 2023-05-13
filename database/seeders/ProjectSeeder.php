<?php

namespace Database\Seeders;

use App\Models\Admin\AdminProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminProject::create([
            'name' => 'Testing Project',
            'project_type' => 'Laravel Development',
            'project_status' => 'Not Started',
            'progress' => '0',
            'billing_type' => 'Fixed Rate',
            'total_rate' => '2500.00',
            'estimated_hours' => '200',
            'start_date' => '2023-05-15',
            'description' => '<p>this is a testing project, this is the description for the testing project</p>',
            'user_id' => '2',
            'created_at' => '2023-05-12 22:37:04',
            'updated_at' => '2023-05-12 22:37:04',
        ]);
    }
}
