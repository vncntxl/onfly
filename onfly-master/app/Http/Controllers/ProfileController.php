<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Handle profile picture update
        if ($request->has('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $profilePicturePath = $profilePicture->store('public/profile_pictures');
            $user->profile_picture = $profilePicturePath;
        }

        // Save user data
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture != null) {
                Storage::delete($user->profile_picture);
            }
            // Save new profile picture
            $path = $request->file('profile_picture')->store('public/img');
            $user->profile_picture = str_replace('public', 'storage', $path);
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect('/');
    }
}
