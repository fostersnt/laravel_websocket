@extends('layouts.app')

@section('content')
    <div>
    <h1>Create User</h1>
    <form action="{{route('users.update', $main_user)}}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" value="{{$main_user->name}}" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" value="{{$main_user->email}}" name="email"><br><br>

        <button type="submit">Update User</button>
    </form>
</div>
@endsection