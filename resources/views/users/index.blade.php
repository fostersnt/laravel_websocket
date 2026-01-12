@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Create New User</a>
        </div>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success">
                <li>{{ Session::get('success') }}</li>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                <li>{{ Session::get('success') }}</li>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-head">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        Echo.private(`user.${orderId}`)
            .listen('OrderShipmentStatusUpdated', (e) => {
                console.log(e.order);
            });
    </script>
@endsection
