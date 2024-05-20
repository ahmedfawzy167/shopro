<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name"=>"Administrator"]);
        Role::create(["name"=>"User"]);
        Role::create(["name"=>"Moderator"]);
        Role::create(["name"=>"Guest"]);
        Role::create(["name"=>"Content Creator"]);
    }
}
