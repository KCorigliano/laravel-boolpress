<?php

use App\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "descrittivo"],
            ["name" => "vacanza"],
            ["name" => "documentario"],
            ["name" => "festività"],
        ];
    
        foreach ($categories as $category) {
            $newCategory = new Categories();
            $newCategory->name = $category['name'];
            $newCategory->save();
        }
    }
}
