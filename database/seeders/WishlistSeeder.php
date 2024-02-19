<?php

namespace Database\Seeders;
use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Wishlist::create(["user_id"=>18,"sku_id"=>2,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>51,"sku_id"=>5,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>54,"sku_id"=>10,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>54,"sku_id"=>2,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>51,"sku_id"=>10,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>51,"sku_id"=>10,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>18,"sku_id"=>5,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>18,"sku_id"=>50,"created_at"=>$now,"updated_at"=>$now]);
        Wishlist::create(["user_id"=>54,"sku_id"=>3,"created_at"=>$now,"updated_at"=>$now]);


    }
}
