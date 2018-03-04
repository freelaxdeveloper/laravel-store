<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Кованные двери']);
        Category::create(['name' => 'Перила и лестницы']);
        Category::create(['name' => 'Входные ворота']);
    }
}
