@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>{{ __('admin.admin_dashboard') }}</h1>
            @include('shared.success-message')

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include('admin.shared.widget', [
                        'icon' => 'fas fa-users',
                        'title' => __('admin.total_users'),
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('admin.shared.widget', [
                        'icon' => 'fas fa-brain',
                        'title' => __('admin.total_ideas'),
                        'data' => $totalIdeas,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('admin.shared.widget', [
                        'icon' => 'fas fa-comments',
                        'title' => __('admin.total_comments'),
                        'data' => $totalComments,
                    ])
                </div>
            </div>
        @endsection
