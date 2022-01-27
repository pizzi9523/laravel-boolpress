<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Programming', 'Web design', 'Automation', 'Best Practices', 'Frontend', 'Backend'];
        foreach ($categories as $category) {
            $_category = new Category();
            $_category->name = $category;
            $_category->slug = Str::slug($category);
            $_category->save();
        }
    }
}
