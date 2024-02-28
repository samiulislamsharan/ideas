@extends('layout.app')

@section('title', 'Ideas Admin - Users')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>{{ __('admin.users') }}</h1>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joinded At</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('users.show', $user) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}

        </div>
    </div>
@endsection
