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
        Category::create(['name' => 'Кухонные уголки']);
        Category::create(['name' => 'Столы обеденные']);
        Category::create(['name' => 'Столы обеденные']);
    }
}
