@extends('layout.app')

@section('title', 'Ideas Admin - Ideas')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-lg-9 col-sm-12">
            <h1>{{ __('admin.ideas') }}</h1>
            @include('shared.success-message')

            <table class="table table-responsive table-striped table-hover" id="admin-ideas-table">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </thead>

                <tbody>
                    @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $idea->user) }}">
                                    {{ $idea->user->name }}
                                </a>
                            </td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ $idea->created_at->toDateString() }}</td>
                            <td class="text-center">
                                <a href="{{ route('ideas.edit', $idea) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('ideas.show', $idea) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $ideas->links() }}

        </div>
    </div>
@endsection
