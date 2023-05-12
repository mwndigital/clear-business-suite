<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            CurrenciesSeeder::class,
            PaymentMethodsSeeder::class,
            ClientSeeder::class,
            ProjectTypeSeeder::class,
            ProjectStatusesSeeder::class,
            ProjectBillingTypeSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
