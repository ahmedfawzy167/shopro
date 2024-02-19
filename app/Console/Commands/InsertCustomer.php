<?php

namespace App\Console\Commands;
use App\Models\Customer;

use Illuminate\Console\Command;

class InsertCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert New Customer';

    /**
     * Execute the console command.
     */
    public function handle()

    {
        // $name = $this->ask('Enter customer name');
        // $phone = $this->ask('Enter customer phone');
        // $address = $this->ask('Enter customer address');
        // $city_id = $this->ask('Enter customer city');

        $customer = new Customer();
        $customer->name = 'Youssef';
        $customer->phone = '01200349618';
        $customer->address ='El-Mohandesin';
        $customer->city_id = 18;
        $customer->save();

        $this->info('Customer Inserted Successfully!');
    }
}
