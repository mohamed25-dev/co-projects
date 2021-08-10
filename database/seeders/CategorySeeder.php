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
            'name' => "تطبيقات ويب",
             'slug' => "تطبيقات-ويب",
         ]);
 
         Category::create([
             'name' => "تطبيقات IOT",
              'slug' => "تطبيقات-IOT",
          ]);
 
          Category::create([
             'name' => "تطبيقات أندرويد",
              'slug' => "تطبيقات-أندرويد",
          ]);
 
          Category::create([
             'name' => "تطبيقات آيفون",
              'slug' => "تطبيقات-آيفون",
          ]);
    }
}
