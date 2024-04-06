<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(BioTableSeeder::class);
        $this->call(AffiliateSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(GearsTableSeeder::class);
        $this->call(CouponSeeder::class);

    }
}
