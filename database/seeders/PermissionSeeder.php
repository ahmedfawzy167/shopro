<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Permission::create(["name"=>"View Users"]);
       Permission::create(["name"=>"Create Users"]);
       Permission::create(["name"=>"Edit  Users"]);
       Permission::create(["name"=>"Delete Users"]);
       Permission::create(["name"=>"View Roles"]);
       Permission::create(["name"=>"Create Roles"]);
       Permission::create(["name"=>"Edit Roles"]);
       Permission::create(["name"=>"Delete Roles"]);
       Permission::create(["name"=>"View Permissions"]);
       Permission::create(["name"=>"Create Permissions"]);
       Permission::create(["name"=>"Edit Permissions"]);
       Permission::create(["name"=>"View Products"]);
       Permission::create(["name"=>"Create Products"]);
       Permission::create(["name"=>"Edit Products"]);
       Permission::create(["name"=>"Delete Products"]);



    }
}
