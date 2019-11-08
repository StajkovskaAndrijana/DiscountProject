<?php

use App\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {
            $customer = new Customer();
            $customer->fullName = $faker->name;
            $customer->companyName = $faker->company;
            $customer->numberOfEmployees = rand(3, 100);
            $customer->phone = $faker->e164PhoneNumber;
            $customer->deal_id = rand(1, 15);
            $customer->save();
        }
    }
}