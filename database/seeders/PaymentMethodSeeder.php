<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethods::create([
            'name' => 'Credit / Debit Card'
        ]);
        PaymentMethods::create([
           'name' => 'Direct Debit'
        ]);
        PaymentMethods::create([
            'name' => 'PayPal'
        ]);
        PaymentMethods::create([
            'name' => 'Bank Transfer'
        ]);
        PaymentMethods::create([
            'name' => 'Cash'
        ]);
    }
}
