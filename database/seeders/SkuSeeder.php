<?php

namespace Database\Seeders;
use App\Models\Sku;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sku::create(["name"=>"Iphone 15 Pro Max , Black color ,128 GB Storage","product_id"=>1]);
        Sku::create(["name"=>"Iphone 15 Pro Max , Blue color , 64 GB Storage ","product_id"=>1]);
        Sku::create(["name"=>"Iphone 15 Pro Max , White color ,256 GB Storage ","product_id"=>1]);
        Sku::create(["name"=>"Iphone 15 Pro Max , White color ,128 GB Storage ","product_id"=>1]);
        Sku::create(["name"=>"Iphone 15 Pro Max , Red color ,64 GB Storage ","product_id"=>1]);
        Sku::create(["name"=>"Iphone 15 Pro Max , Grey color ,256 GB Storage ","product_id"=>1]);

        Sku::create(["name"=>"Iphone 13 Pro Max , Black color ,256 GB Storage ","product_id"=>2]);
        Sku::create(["name"=>"Iphone 13 Pro Max , White color ,128 GB Storage ","product_id"=>2]);
        Sku::create(["name"=>"Iphone 13 Pro Max , Clear color ,64 GB Storage ","product_id"=>2]);
        Sku::create(["name"=>"Iphone 13 Pro Max , Black color ,128 GB Storage ","product_id"=>2]);


        Sku::create(["name"=>"Iphone 11 Pro Max , Red color ,256 GB Storage ","product_id"=>3]);
        Sku::create(["name"=>"Iphone 11 Pro Max , White color ,128 GB Storage ","product_id"=>3]);
        Sku::create(["name"=>"Iphone 11 Pro Max , Blue color ,256 GB Storage ","product_id"=>3]);
        Sku::create(["name"=>"Iphone 11 Pro Max , Grey color ,64 GB Storage ","product_id"=>3]);


    }
}
