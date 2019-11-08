<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Производи', 'Услуги', 'Ресторани', 'Фитнес центри', 'Образование и кариера', 'Кариера'];

        foreach ($categories as $category_name) {
            $category = new Category();
            $category->name = $category_name;
            $category->save();
        }
    }
}