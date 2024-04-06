<?php

namespace Database\Seeders;

use App\Models\Bio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bio::create([
            'title' => "Hi! I'm JDao The Retro Streamer",
            'content' => 'My name is test, but lots of you may know me as test! I started streaming in 2016 and never stopped since then. I mostly play retro games from the 90’s and 00’s to bring back that nostalgic feel!',
        ]);
    }
}
