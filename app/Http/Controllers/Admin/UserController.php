<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserAccountMail;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {

        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            //'password' => 'required|min:8',
            'role' => 'required|in:admin,editor',
        ]);

        $password = Str::random(12);

        $user = User::create([
           'name' => $validated['name'],
           'email' => $validated['email'],
           'password' => Hash::make($password),
           'role' => $validated['role'],
        ]);

        Mail::to($user->email)->send(
            new NewUserAccountMail($user, $password)
        );

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur créé');
    }
}
