<?php

use App\Company;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $company = new Company();
            $company->name = $faker->company;
            $company->thumbnail = 'http://seekvectorlogo.com/wp-content/uploads/2018/01/avis-vector-logo.png';
            $company->description = $faker->text;
            $company->websiteLink = $faker->url;
            $company->facebookLink = $faker->url;
            $company->phone = $faker->e164PhoneNumber;
            $company->googleMapsAddress = $faker->address;
            $company->email = $faker->companyEmail;
            $company->address = $faker->address;
            $company->save();
        }
    }
}