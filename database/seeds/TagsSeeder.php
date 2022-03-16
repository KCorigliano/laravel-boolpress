<?php

use App\Tags;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ["name" => "Adventure"],
            ["name" => "Horror"],
            ["name" => "Classic"],
            ["name" => "Action"],
            ["name" => "Thriller"],
        ];
    
        foreach ($tags as $tag) {
            $newTag = new Tags();
            $newTag->name = $tag['name'];
            $newTag->save();
        }
    }
}
