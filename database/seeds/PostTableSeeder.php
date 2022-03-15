<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ["title"=> "primo post", "content" => "questo è il primo post"],
        ];

        foreach ($posts as $post) {
            $newPost = new Post();
            $newPost->fill($post);
            $newPost->save();
        };
    }
}
