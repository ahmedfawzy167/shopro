<?php

namespace Database\Seeders;
use App\Models\Spec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spec::create(["name"=>"Ram: 8GB, 16GB, 32GB","spec_category_id"=>1]);
        Spec::create(["name"=>"Intel Core i5, Intel Core i7, AMD Ryzen 5, AMD Ryzen 7","spec_category_id"=>4]);
        Spec::create(["name"=>"Capacity: 4000mAh, 5000mAh, 6000mAh","spec_category_id"=>5]);
        Spec::create(["name"=>"Windows 10, Windows 11, macOS, Android","spec_category_id"=>7]);
        Spec::create(["name"=>"Wi-Fi: 802.11ac, 802.11ax (Wi-Fi 6)Bluetooth: 5.0, 5.2Cellular: 5G, LTE","spec_category_id"=>9]);
        Spec::create(["name"=>"12MP", "spec_category_id"=>2]);
        Spec::create(["name"=>"Dual", "spec_category_id"=>2]);
        Spec::create(["name"=>"Fast Charging: 30W", "spec_category_id"=>6]);
        Spec::create(["name"=>"Generation: 12th Gen", "spec_category_id"=>4]);
        Spec::create(["name"=>"4K video recording", "spec_category_id"=>2]);
        Spec::create(["name"=>"Speed: 3200MHz", "spec_category_id"=>1]);


    }
}
