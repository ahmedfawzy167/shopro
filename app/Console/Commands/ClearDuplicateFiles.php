<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class ClearDuplicateFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear-duplicates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear duplicate files from storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Storage::files('public');

        foreach($files as $file) {
            if(Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        $this->info('Duplicate Files Cleared!');

    }
}
