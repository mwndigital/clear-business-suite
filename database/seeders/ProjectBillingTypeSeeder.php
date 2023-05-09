<?php

namespace Database\Seeders;

use App\Models\Admin\ProjectBillingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectBillingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectBillingType::create([
            'name' => 'Hourly'
        ]);
        ProjectBillingType::create([
            'name' => 'Fixed Rate'
        ]);
        ProjectBillingType::create([
            'name' => 'Project Hours'
        ]);
    }
}
