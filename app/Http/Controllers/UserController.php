<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // model binding route
    public function show(User $user) {
        return view('user.show', compact('user'));
    }

    // normal route, query user with id
    public function show2($id) {
        $user = User::findOrFail($id);
        echo "User data : {$user->id} {$user->name} ";
    }

    public function edit( User $user ) {

        // dd($user->roles->pluck('id'));

        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {

        $validation_rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,id,'.$user->id,
        ];

        if ($request->filled('password')) {
            $validation_rule['password'] = [ Password::defaults() ];
        }

        $request->validate( $validation_rule);

        $user->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Sync user roles
        $user->roles()->sync( $request->input('roles', []) );


        return redirect()->route('user.edit', $user)->with('success', 'User updated successfully');
    }
}


