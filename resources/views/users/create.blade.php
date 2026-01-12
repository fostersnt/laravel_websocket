@extends('layouts.app')

@section('content')
    <div>
    <h1>Create User</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <button type="submit">Create User</button>
    </form>
</div>
@endsection