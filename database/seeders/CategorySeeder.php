<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'ar_name' => "تطبيقات ويب",
            'en_name' => "Web Applications",
            'slug' => "تطبيقات-ويب",
        ]);

        Category::create([
            'ar_name' => "تطبيقات IOT",
            'en_name' => "IOT Applications",
            'slug' => "تطبيقات-IOT",
        ]);

        Category::create([
            'ar_name' => "تطبيقات أندرويد",
            'en_name' => "Android Applications",
            'slug' => "تطبيقات-أندرويد",
        ]);

        Category::create([
            'ar_name' => "تطبيقات IOT",
            'en_name' => "IOS Applications",
            'slug' => "تطبيقات-آيفون",
        ]);
    }
}
