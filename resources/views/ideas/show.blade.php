@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            @include('shared.left-sidebar')
        </div>
        <div class="col-lg-6 col-sm-12">
            @include('shared.success-message')
            <hr>
            <div class="mt-3">
                @include('ideas.shared.idea-card')
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
