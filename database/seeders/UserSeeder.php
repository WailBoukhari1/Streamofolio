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
        // Create a admin
        $user = User::create([
            'image' => 'assets\img\main\samples\about-me.jpg',
            'username' => 'John Doe',
            'email' => 'john@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $schedule = [
            'Mondays' => '9:00',
            'Tuesdays' => '10:00',
            'Wednesdays' => '',
            'Thursdays' => '11:00',
            'Fridays' => '',
            'Saturdays' => '10:00',
            'Sundays' => '',
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
