<?php

use App\Deal;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DealsTableSeeder extends Seeder
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
            $deal = new Deal();
            $deal->title = "Попуст во најновиот фитнес центар";
            $deal->type_of_discount = "50% при купување";
            $deal->price = "750";
            $deal->description = $faker->text;
            $deal->company_id = rand(1, 10);
            $deal->category_id = rand(1, 5);
            $deal->save();
        }
    }
}