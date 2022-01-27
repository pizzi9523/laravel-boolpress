<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->title = $faker->sentence;
            $post->image = $faker->imageUrl(500, 400, 'post');
            $post->body = $faker->paragraph();
            $post->save();
        }
    }
}
