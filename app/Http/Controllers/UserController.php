<?php

namespace App\Http\Controllers;

use App\Events\UserInfoUpdated;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()) {
            return redirect()->route('show.login');
        }
        $users = User::query()->latest()->get();
        $user = User::query()->where('email', 'fostersnt@gmail.com')->first();
        event(new UserInfoUpdated($user));
        // dd($user);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt('password');
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(Request $request, $user)
    {
        $main_user = User::query()->find($user);
        return view('users.edit', compact('main_user'));
        
    }

    public function update(Request $request, $user)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $main_user = User::query()->find($user);
        $main_user->update($data);
        // dd($main_user);
        event(new UserInfoUpdated($main_user));
        return redirect()->route('users.index')->with('success', 'User has been updated successfully');
    }
}
