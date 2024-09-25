<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

}
