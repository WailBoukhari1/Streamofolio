<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a user
        $user = User::create([
            'image' => 'assets\img\main\samples\about-me.jpg',
            'username' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Define the schedule with days of the week and a specific time in EDT
        $schedule = [
            'Mondays' => '10:00',
            'Tuesdays' => '10:00',
            'Wednesdays' => '10:00',
            'Thursdays' => '10:00',
            'Fridays' => '10:00',
            'Saturdays' => '10:00',
            'Sundays' => '10:00',
        ];

        // Convert the schedule to JSON
        $scheduleJson = json_encode($schedule);

        // Create an admin with the schedule
        Admin::create([
            'twitch_username' => 'admin_twitch',
            'schedule' => $scheduleJson,
            'aliase' => 'admin_alias',
            'user_id' => $user->id,
        ]);
    }
}
