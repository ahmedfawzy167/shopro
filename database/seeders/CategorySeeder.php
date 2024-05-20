<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["name"=>"Smart Phones"]);
        Category::create(["name"=>"Electronics"]);
        Category::create(["name"=>"Appliances"]);
        Category::create(["name"=>"Fashion"]);
        Category::create(["name"=>"Grocery"]);
        Category::create(["name"=>"Video Games"]);
        Category::create(["name"=>"Perfumes"]);
        Category::create(["name"=>"Toys"]);
    }
}
