<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class PrintName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print User Name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $users = User::all();

     if($this->output->isDecorated()) {
        $bar = $this->output->createProgressBar(count($users));
        $bar->start();
     }

     foreach($users as $user) {
        $this->info($user->name);
        $this->newLine();

        if(isset($bar)) {
            $bar->advance();
        }
     }

     if(isset($bar)) {
        $bar->finish();
      }
    }



}
