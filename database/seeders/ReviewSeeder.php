<?php

namespace Database\Seeders;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create(['product_id' => 2,'user_id' => 32,'content'=> 'I\'m really Enjoy This Product','rating' => 5]);
        Review::create(['product_id' => 5,'user_id' => 32,'content'=> 'The Product is amazing','rating' => 4]);
        Review::create(['product_id' => 4,'user_id' => 35,'content'=> 'The Product is Very Bad','rating' => 2]);
        Review::create(['product_id' => 6,'user_id' => 36,'content'=> 'The Product Not Comfortable','rating' => 3]);

    }
}
