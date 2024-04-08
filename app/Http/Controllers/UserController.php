<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add other fields as necessary
        ]);

        // Update the user
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
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
public function unban(User $user)
{
    // Assuming 'banned' is a boolean
    $user->update(['banned' => false]);

    return back()->with('success', 'User has been unbanned successfully!');
}
}
