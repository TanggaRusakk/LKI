<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display user's profile.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Update user's profile information.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo && file_exists(public_path('images/profiles/' . $user->photo))) {
                unlink(public_path('images/profiles/' . $user->photo));
            }

            // Upload new photo
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/profiles'), $imageName);
            $validated['photo'] = $imageName;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete user's profile photo.
     */
    public function deletePhoto()
    {
        $user = Auth::user();

        // Delete photo file if exists
        if ($user->photo && file_exists(public_path('images/profiles/' . $user->photo))) {
            unlink(public_path('images/profiles/' . $user->photo));
        }

        // Set photo to null
        $user->photo = null;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile photo deleted successfully!');
    }

    /**
     * Update user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile')->with('success', 'Password changed successfully!');
    }

    /**
     * Delete user's account and all related data.
     */
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Prevent admin from deleting their account
        if ($user->isAdmin()) {
            return redirect()->route('profile')->with('error', 'Admin accounts cannot be deleted.');
        }

        // Validate password confirmation
        $request->validate([
            'password' => 'required|current_password',
        ]);

        // Delete profile photo if exists
        if ($user->photo && file_exists(public_path('images/profiles/' . $user->photo))) {
            unlink(public_path('images/profiles/' . $user->photo));
        }

        // Logout user
        Auth::logout();

        // Delete user (cascade will delete all reviews automatically)
        $user->delete();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
    }
}
