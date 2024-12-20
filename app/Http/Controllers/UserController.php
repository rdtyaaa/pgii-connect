<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar pengguna dengan pagination
    public function index(Request $request)
    {
        $users = User::paginate(25); // Pagination 10 data per halaman
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form create
    public function create()
    {
        return view('admin.users.create');
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hash password
        $validated['password'] = Hash::make($request->password);

        // Handle avatar upload jika ada
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Simpan data pengguna baru
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Menampilkan form edit
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update data pengguna
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        // 'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'is_admin' => 'required|boolean',
    ]);

    // Handle avatar upload if exists
    // if ($request->hasFile('avatar')) {
    //     $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
    // }

    // Update the user, including 'is_admin'
    $user->update($validated);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    // Delete pengguna
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    // Memberikan akses admin
    public function giveAccess(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Verifikasi password pengguna yang sedang login
        if (!Hash::check($request->password, auth()->user()->password)) {
            return redirect()->route('users.index')->withErrors(['password' => 'Invalid password.']);
        }

        $user->update(['is_admin' => true]);

        return redirect()->route('users.index')->with('success', 'Admin access granted successfully.');
    }
}
