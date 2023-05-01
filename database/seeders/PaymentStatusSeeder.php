<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentStatus::create(['name' => 'paid']);
        PaymentStatus::create(['name' => 'unpaid']);
        PaymentStatus::create(['name' => 'overdue']);
        PaymentStatus::create(['name' => 'cancelled']);
        PaymentStatus::create(['name' => 'refunded']);
        PaymentStatus::create(['name' => 'payment pending']);
        PaymentStatus::create(['name' => 'collections']);
    }
}
