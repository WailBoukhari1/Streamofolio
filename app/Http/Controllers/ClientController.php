<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
        ]);

        // Update user data
        $user = auth()->user();
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        if ($validatedData['first-name']) {
            $user->client->first_name = $validatedData['first-name'];
        }
        if ($validatedData['last-name']) {
            $user->client->last_name = $validatedData['last-name'];
        }
        if ($validatedData['change-password']) {
            $user->password = bcrypt($validatedData['change-password']);
        }

        // Handle image upload
        if ($request->hasFile('user-profile-img')) {
            $imagePath = $request->file('user-profile-img')->store('profile-images', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}
