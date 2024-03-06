@extends('layout.app')

@section('title', 'Ideas Admin - Comments')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-lg-9 col-sm-12">
            <h1>{{ __('admin.comments') }}</h1>
            @include('shared.success-message')

            <table class="table table-responsive table-striped table-hover" id="admin-comments-table">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>User</th>
                    <th>Idea</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </thead>

                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $comment->user) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.show', $comment->idea) }}">
                                    {{ $comment->idea->id }}
                                </a>
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td class="text-center">
                                {{-- <a href="{{ route('comment.edit', $comment) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('comment.show', $comment) }}" class="btn btn-primary btn-sm">View</a> --}}
                                <form action="{{ route('admin.comments.destroy', $comment) }}", method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#!" class="btn btn-danger btn-sm"
                                        onclick="this.closest('form').submit(); return false;">
                                        Delete
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $comments->links() }}

        </div>
    </div>
@endsection
