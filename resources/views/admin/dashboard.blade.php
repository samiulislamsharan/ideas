@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>{{ __('admin.admin_dashboard') }}</h1>
            @include('shared.success-message')
        </div>
    </div>
@endsection
