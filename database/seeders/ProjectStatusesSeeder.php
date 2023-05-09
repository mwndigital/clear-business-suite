<?php

namespace Database\Seeders;

use App\Models\Admin\ProjectStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectStatus::create([
            'name' => 'Not Started'
        ]);
        ProjectStatus::create([
            'name' => 'In Planning'
        ]);
        ProjectStatus::create([
            'name' => 'In Design'
        ]);
        ProjectStatus::create([
            'name' => 'In Development'
        ]);
        ProjectStatus::create([
            'name' => 'In Progress'
        ]);
        ProjectStatus::create([
            'name' => 'On Hold'
        ]);
        ProjectStatus::create([
            'name' => 'Awaiting to go live'
        ]);
        ProjectStatus::create([
            'name' => 'Completed'
        ]);
        ProjectStatus::create([
            'name' => 'Cancelled'
        ]);
    }
}
