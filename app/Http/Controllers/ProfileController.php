<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::findOrFail(Auth::id());

        return view('pages.profile', compact('user'));
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());

        return view('pages.profile-update', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'nullable|string|max:255',
            'birthmonth' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'old_password' => 'nullable:password|string|min:8',
            'password' => 'nullable|string|min:8',
        ]);

        $data = $request->only(['first_name', 'last_name', 'phone', 'birthday', 'birthmonth', 'image', 'gender', 'address', 'address_2', 'city', 'state', 'zip', 'country', 'email', 'image']);

        if ($request->filled('password')) {
            if (!password_verify($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'The provided old password does not match our records.'])->withInput();
            }
            $user->password = bcrypt($request->password);
        }

        if ($request->input('email')) {
            $data['email'] = $request->email;
        }

        if ($request->hasFile('image')) {
            if($user->image){
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $request->file('image')->store('profile', 'public');

        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
