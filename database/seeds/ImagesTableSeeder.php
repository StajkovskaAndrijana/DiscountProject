<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $image = new Image();
            for ($j = 1; $j <= 8; $j++) {
                $image->path = $faker->imageUrl(640, 480);
            }
            $image->deal_id = rand(1, 15);
            $image->save();
        }
    }
}