<?php

namespace App\Console\Commands;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class AssignPermissionsToRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:permissions-to-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Permissions to Roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role2 = Role::find(2);
        $role4 = Role::find(4);
        $role6 = Role::find(6);

     $perm2 = Permission::find(2);
     $perm3 = Permission::find(3);
     $perm4 = Permission::find(4);
     $perm5 = Permission::find(5);
     $perm6 = Permission::find(6);
     $perm7 = Permission::find(7);
     $perm8 = Permission::find(8);
     $perm9 = Permission::find(9);
     $perm10 = Permission::find(10);
     $perm11 = Permission::find(11);
     $perm12 = Permission::find(12);
     $perm13 = Permission::find(13);
     $perm14 = Permission::find(14);
     $perm15 = Permission::find(15);

     // Role 2 permissions
    $role2->permissions()->attach([
    $perm2->id,
    $perm4->id,
    $perm5->id,
    $perm6->id,
    $perm7->id,
    $perm8->id,
  ]);

  // Role 4 permissions
    $role4->permissions()->attach([
    $perm9->id,
    $perm10->id,
    $perm11->id,
]);

// Role 6 permissions
    $role6->permissions()->attach([
    $perm12->id,
    $perm13->id,
    $perm14->id,
    $perm15->id,
]);

   $role2->save();
   $role4->save();
   $role6->save();

    $this->info("Permissions Assigned to Roles Successfully");

}
}
