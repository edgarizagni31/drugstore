<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Password;

class UserController extends Controller
{
  public function index()
  {
      $users = User::with('role')->get();
      return view('users.index', compact('users'));
  }

  public function create()
  {
      $roles = Role::all();
      return view('users.create', compact('roles'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|unique:users',
          'password' => ['required', 'confirmed'],
          'role_id' => 'required|exists:roles,id',
      ]);

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role_id' => $request->role_id,
      ]);

      return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
  }

  public function show(User $user)
  {
      return view('users.show', compact('user'));
  }

  public function edit(User $user)
  {
      $roles = Role::all();
      return view('users.edit', compact('user', 'roles'));
  }

  public function update(Request $request, User $user)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email,' . $user->id,
          'password' => ['nullable', 'confirmed'],
          'role_id' => 'required|exists:roles,id',
      ]);

      $user->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password ? Hash::make($request->password) : $user->password,
          'role_id' => $request->role_id,
      ]);

      return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
  }

  public function destroy(User $user)
  {
      $user->delete();
      return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
  }
}
