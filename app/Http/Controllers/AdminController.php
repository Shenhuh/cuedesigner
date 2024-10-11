<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import your User model

class AdminController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        $users = User::all(); 
        return view('admin.home', compact('users')); // Create this view
    }

    // Manage users (List, create, edit, delete)
    public function manageUsers()
    {
        $users = User::all(); // Get all users
        return view('admin.users.index', compact('users')); // Create this view
    }

    // Show the form for creating a new user
    public function createUser()
    {
        return view('admin.users.create'); // Create this view
    }

    // Store a newly created user
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin', // Allowable roles
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    // Show the form for editing a user
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user')); // Create this view
    }

    // Update the specified user
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    // Remove the specified user
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
