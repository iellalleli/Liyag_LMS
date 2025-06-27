<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SalesRep;

class UserManagementController extends Controller
{
    public function create()
    {
        return view('admin.create_user');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,sales_rep', // or add 'client' if needed
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    $user->assignRole($request->role); // Spatie role assignment

    if ($request->role === 'sales_rep') {
        SalesRep::create([
            'user_id' => $user->id,
            'leads_assigned_to' => 0, // Default value
        ]);
    }

    return redirect()->route('admin.dashboard')->with('success', 'User created successfully!');
    }
}
