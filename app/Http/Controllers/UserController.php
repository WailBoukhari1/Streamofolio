<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function updateProfile(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'username' => 'required|string|max:255',
            'first-name' => 'nullable|string|max:255',
            'last-name' => 'nullable|string|max:255',
            'change-password' => 'nullable|string|min:8',
            'repeat-password' => 'nullable|string|min:8|same:change-password',
            'user-profile-img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitch-username' => 'nullable|string|max:255',
            'aliase' => 'nullable|string|max:255',
            'bio-image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string',
            'title' => 'nullable|string|max:255',
            'monday-schedule' => 'nullable|string',
            'tuesday-schedule' => 'nullable|string',
            'wednesday-schedule' => 'nullable|string',
            'thursday-schedule' => 'nullable|string',
            'friday-schedule' => 'nullable|string',
            'saturday-schedule' => 'nullable|string',
            'sunday-schedule' => 'nullable|string',
        ]);

        // Update user data
        $user = auth()->user();

        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        if ($validatedData['first-name']) {
            $user->first_name = $validatedData['first-name'];
        }
        if ($validatedData['last-name']) {
            $user->last_name = $validatedData['last-name'];
        }
        if ($validatedData['change-password']) {
            $user->password = bcrypt($validatedData['change-password']);
        }

        // Handle image upload for user profile
        if ($request->hasFile('user-profile-img')) {
            $imagePath = $request->file('user-profile-img')->store('profile-images', 'public');
            $user->image = $imagePath;
        }

        // Update admin-specific data
        if ($user->admin) {
            if ($request->filled('twitch-username')) {
                $user->admin->twitch_username = $validatedData['twitch-username'];
            }
            if ($request->filled('aliase')) {
                $user->admin->aliase = $validatedData['aliase'];
            }

            // Retrieve the bio associated with the admin
            $bio = $user->admin->bio;

            // Handle bio image upload and bio update
            if ($request->hasFile('bio-image')) {
                $bioImagePath = $request->file('bio-image')->store('bio-images', 'public');
                $bio->bio_image = $bioImagePath;
            }
            if ($request->filled('content')) {
                $bio->content = $validatedData['content'];
            }
            if ($request->filled('title')) {
                $bio->title = $validatedData['title'];
            }

            // Save the updated bio
            $bio->save();

            // Update schedule fields if needed
            // Retrieve the existing schedule data
            $existingSchedule = json_decode($user->admin->schedule, true);

            // Update schedule fields if needed
            $scheduleData = [
                'Mondays' => $validatedData['monday-schedule'] ?? ($existingSchedule['Mondays'] ?? null),
                'Tuesdays' => $validatedData['tuesday-schedule'] ?? ($existingSchedule['Tuesdays'] ?? null),
                'Wednesdays' => $validatedData['wednesday-schedule'] ?? ($existingSchedule['Wednesdays'] ?? null),
                'Thursdays' => $validatedData['thursday-schedule'] ?? ($existingSchedule['Thursdays'] ?? null),
                'Fridays' => $validatedData['friday-schedule'] ?? ($existingSchedule['Fridays'] ?? null),
                'Saturdays' => $validatedData['saturday-schedule'] ?? ($existingSchedule['Saturdays'] ?? null),
                'Sundays' => $validatedData['sunday-schedule'] ?? ($existingSchedule['Sundays'] ?? null),
            ];

            $user->admin->schedule = json_encode($scheduleData);

            // Save admin data
            $user->admin->save();
        }

        // Save user data
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
    public function banUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->banned_at = now();
        $user->save();

        // Additional code to handle after banning a user like logging, sending notification, etc.

        return back()->with('success', 'User has been banned successfully.');
    }
    public function unban($userId)
    {
        // Assuming 'banned' is a boolean
        $user = User::findOrFail($userId);
        $user->banned_at = null;
        $user->save();

        return back()->with('success', 'User has been unbanned successfully!');
    }
}
