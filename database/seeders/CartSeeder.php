<?php

namespace Database\Seeders;
use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Cart::create(["user_id"=>18,"sku_id"=>2,"quantity"=>1]);
       Cart::create(["user_id"=>51,"sku_id"=>2,"quantity"=>2]);
       Cart::create(["user_id"=>54,"sku_id"=>1,"quantity"=>1]);
       Cart::create(["user_id"=>85,"sku_id"=>3,"quantity"=>2]);
       Cart::create(["user_id"=>91,"sku_id"=>3,"quantity"=>1]);


    }
}
