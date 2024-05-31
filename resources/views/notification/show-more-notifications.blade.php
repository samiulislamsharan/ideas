@extends('layout.app')

@section('title', 'Notifications')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            @include('shared.left-sidebar')
        </div>
        <div class="col-lg-6 col-sm-12">
            <h1>{{ __('ideas.notifications') }}</h1>
            @include('notification.notification-card')
        </div>
        <div class="col-lg-3 col-sm-12">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
