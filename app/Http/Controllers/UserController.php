<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

    public function create()
{
    return view('users.create');
}

    public function store(Request $request)
{
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);
    return redirect()->route('users.index');
}

    public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

    public function update(Request $request, User $user)
{
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);
    return redirect()->route('users.index');
}

    public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index');
}

}
