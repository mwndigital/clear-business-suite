<?php

namespace Database\Seeders;

use App\Models\Admin\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create([
            'name' => 'Website Design / Development'
        ]);
        ProjectType::create([
            'name' => 'WordPress Design / Development'
        ]);
        ProjectType::create([
            'name' => 'Laravel Development'
        ]);
        ProjectType::create([
            'name' => 'Graphical Design'
        ]);
        ProjectType::create([
            'name' => 'Microsoft 365'
        ]);
        ProjectType::create([
            'name' => 'VoIP'
        ]);
        ProjectType::create([
            'name' => 'Web Hosting Migration'
        ]);
        ProjectType::create([
            'name' => 'Website Maintenance'
        ]);
    }
}
