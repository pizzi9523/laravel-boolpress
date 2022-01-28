<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Community', 'Front-End-Devs', 'Back-End-Devs', 'Full-Stack-Devs', 'Laravel-Devs', 'Vue-Devs'];

        foreach ($tags as $tag) {
            $_tag = new Tag();
            $_tag->name = $tag;
            $_tag->save();
        }
    }
}