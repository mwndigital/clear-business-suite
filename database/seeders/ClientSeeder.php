<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = [
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password)
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password)
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password)
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password)
            ],
        ];
        foreach($users as $userData) {
            $user = User::create($userData);

            $user->assignRole('client');

            $userDetail = [
                'user_id' => $user->id,
                'company_name' => $faker->company,
                'default_language' => 'English',
                'address_line_one' => $faker->streetAddress,
                'address_line_two' => $faker->streetAddress,
                'town_city' => $faker->city,
                'zip_postcode' => $faker->postcode,
                'country' => $faker->country,
                'phone_number' => $faker->phoneNumber,
                'default_payment_method' => 'Bank Transfer',
                'default_currency' => 'GBP',
                'default_currency_symbol' => '£',
                'website' => $faker->url,
            ];

            UserDetails::create($userDetail);
        }
    }
}
