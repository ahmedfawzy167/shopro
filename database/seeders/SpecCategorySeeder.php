<?php

namespace Database\Seeders;
use App\Models\SpecCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecCategory::create(["name"=>"Memory"]);
        SpecCategory::create(["name"=>"Camera"]);
        SpecCategory::create(["name"=>"Processor"]);
        SpecCategory::create(["name"=>"Storage"]);
        SpecCategory::create(["name"=>"Battery Life"]);
        SpecCategory::create(["name"=>"Operating System"]);
        SpecCategory::create(["name"=>"Keyboard"]);
        SpecCategory::create(["name"=>"Wireless Connectivity"]);
        SpecCategory::create(["name"=>"Audio"]);
        SpecCategory::create(["name"=>"Touchscreen"]);
        SpecCategory::create(["name"=>"Dimensions"]);

        SpecCategory::create(["name"=>"Fat Content"]);
        SpecCategory::create(["name"=>"Protein Content"]);
        SpecCategory::create(["name"=>"Calcium Content"]);
        SpecCategory::create(["name"=>"Vitamin D Content"]);
        SpecCategory::create(["name"=>"Lactose Content"]);
        SpecCategory::create(["name"=>"Origin"]);
        SpecCategory::create(["name"=>"Processing Method "]);
        SpecCategory::create(["name"=>"Package Type"]);
        SpecCategory::create(["name"=>"Flavor"]);


    }
}
