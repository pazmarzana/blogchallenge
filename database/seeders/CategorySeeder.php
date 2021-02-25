<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    static $categories = [
        'HTML ',
        'CSS ',
        'Javascript ',
        'Bootstrap ',
        'Java ',
        'Android ',
        'PHP ',
        'Laravel ',
        'SQL ',
        'Python ',
        'C#'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$categories as $category) {
            Category::factory()->create(['name' => $category]);
        }
    }
}
