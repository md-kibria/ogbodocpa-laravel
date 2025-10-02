<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     public function index()
    {
        // $members = User::where('role', 'member')->orderBy('id', 'desc')->paginate(10);
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.member', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'status' => 'nullable|in:active,rejected',
            'balance' => 'nullable'
        ]);

        if($request->status) {
            $user->status = $request->status;
        }

        if($request->balance) {
            $user->balance = $request->balance;
        }

        $user->save();

        return redirect()->route('admin.users.show', $user->id)->with('success', 'User updated successfully.');
    }

    public function delete(User $user)
    {
        if($user->image) {
            Storage::delete($user->image);
        }
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
