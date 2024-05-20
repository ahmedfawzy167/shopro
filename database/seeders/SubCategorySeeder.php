<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create(["name"=>"Apple","category_id"=>1]);
        SubCategory::create(["name"=>"Andriod", "category_id"=>1]);

        SubCategory::create(["name"=>"Tvs","category_id"=>2]);
        SubCategory::create(["name"=>"Laptops","category_id"=>2]);
        SubCategory::create(["name"=>"Cameras","category_id"=>2]);
        SubCategory::create(["name"=>"Speakers","category_id"=>2]);
        SubCategory::create(["name"=>"Headphones","category_id"=>2]);
        SubCategory::create(["name"=>"Computer&Accessories","category_id"=>2]);
        SubCategory::create(["name"=>"Adapters","category_id"=>2]);


        SubCategory::create(["name"=>"Refrigerators","category_id"=>3]);
        SubCategory::create(["name"=>"Washing Machines","category_id"=>3]);
        SubCategory::create(["name"=>"Air Conditioners","category_id"=>3]);
        SubCategory::create(["name"=>"Microwaves","category_id"=>3]);
        SubCategory::create(["name"=>"Blenders","category_id"=>3]);

        SubCategory::create(["name"=>"Shirts","category_id"=>4]);
        SubCategory::create(["name"=>"Pants","category_id"=>4]);
        SubCategory::create(["name"=>"Dresses","category_id"=>4]);
        SubCategory::create(["name"=>"Shoes","category_id"=>4]);
        SubCategory::create(["name"=>"Accessories","category_id"=>4]);

        SubCategory::create(["name"=>"Rice & Pasta","category_id"=>5]);
        SubCategory::create(["name"=>"Snacks","category_id"=>5]);
        SubCategory::create(["name"=>"Cooking & Baking","category_id"=>5]);
        SubCategory::create(["name"=>"Herbs & Spices","category_id"=>5]);
        SubCategory::create(["name"=>"Ceral & Outs","category_id"=>5]);
        SubCategory::create(["name"=>"Suaces & Gravies","category_id"=>5]);
        SubCategory::create(["name"=>"Beverages","category_id"=>5]);
        SubCategory::create(["name"=>"Personal Care","category_id"=>5]);
        SubCategory::create(["name"=>"Beauty Products","category_id"=>5]);

        SubCategory::create(["name"=>"Xbox","category_id"=>6]);
        SubCategory::create(["name"=>"Playstation","category_id"=>6]);
        SubCategory::create(["name"=>"Nintendo","category_id"=>6]);

        SubCategory::create(["name"=>"Men's Perfumes","category_id"=>7]);
        SubCategory::create(["name"=>"Women's Perfumes","category_id"=>7]);


        SubCategory::create(["name"=>"Action Figures","category_id"=>8]);
        SubCategory::create(["name"=>"Board Games","category_id"=>8]);
        SubCategory::create(["name"=>"Puzzles","category_id"=>8]);
        SubCategory::create(["name"=>"Building Sets","category_id"=>8]);
        SubCategory::create(["name"=>"Dolls","category_id"=>8]);

        SubCategory::create(["name"=>"Smart Watch","category_id"=>2]);














    }
}
