<?php

namespace Database\Seeders;

use App\Models\Gear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the number of records you want to seed
        $numberOfRecords = 6;

        // Use the GearFactory to seed data
        Gear::factory($numberOfRecords)->create();
    }
}   
