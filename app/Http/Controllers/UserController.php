<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->get();
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
}
