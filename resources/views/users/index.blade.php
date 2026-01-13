@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="mb-3">
            Welcome <span id="user_name">{{ auth()->user()->name ?? '' }}</span>
        </div>
    </div>
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
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script>
        let userId = "{{auth()->user()->id}}";
        console.log(`CURRENT USER ID === ${userId}`);
        // console.log(`ECHO === ${Echo}`);
        
        Echo.private(`user.${userId}`)
            .listen('OrderShipmentStatusUpdated', (e) => {
                console.log(e.user);
            });
    </script> --}}

    @push('scripts')
        <script type="module">
            let userId = "{{ auth()->id() }}";

            window.Echo.private(`user.${userId}`)
                .listen('UserInfoUpdated', (e) => {
                    console.table(e.user);
                    updateUserName(e.user);
                });

                function updateUserName(user)
                {
                    document.getElementById('user_name').innerHTML = user.name;
                }
        </script>
    @endpush
@endsection
