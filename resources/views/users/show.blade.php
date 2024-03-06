@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12 mb-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-lg-6 col-sm-12">
            @include('shared.success-message')
            <div class="">
                @include('users.shared.user-card')
            </div>
            <hr>

            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
            @empty
                <div class="alert alert-info text-center">
                    {{ __('ideas.no_ideas') }}
                </div>
            @endforelse
            <div class="mt-3">
                {{-- pagination --}}
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
