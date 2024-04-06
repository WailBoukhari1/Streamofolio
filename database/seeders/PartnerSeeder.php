<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of records you want to seed
        $numberOfRecords = 6;

        // Use the GearFactory to seed data
        Partner::factory($numberOfRecords)->create();
    }
}
