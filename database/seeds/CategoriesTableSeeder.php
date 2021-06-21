<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Primi', 'Secondi', 'Contorni', 'Dolci'];

        foreach ($categories as $category) {
            //instance
            $new_category= new Category();

            //populate
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');

            //Save
            $new_category->save();
        }
    }
}
