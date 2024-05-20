<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Status::create(["name"=>"Pending"]);
      Status::create(["name"=>"Confirmed"]);
      Status::create(["name"=>"Processing"]);
      Status::create(["name"=>"On Hold"]);
      Status::create(["name"=>"Shipped"]);
      Status::create(["name"=>"Delivered"]);
      Status::create(["name"=>"Cancelled"]);
      Status::create(["name"=>"Returned"]);
    }
}
