<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class AssignRolesToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:roles-to-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Roles to Users';

    /**
     * Execute the console command.
     */
    public function handle()
 {
     $roles = [2, 4, 6];

     $users = User::all();

   foreach($users as $user) {
    if($user->id == 1) {
        $role = 1;
    }
    else{
        $role = $roles[array_rand($roles)];
    }

     $user->roles()->attach($role);
}
     $this->info('Roles assigned to All Users Successfully');
 }
}
