<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('admin.dashboard') }}">
                    <span>{{ __('admin.dashboard') }}</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('admin.users.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('admin.users.index') }}">
                    <span>{{ __('admin.users') }}</span>
                </a>
            </li>
            </li>
            <li>
                <a class="{{ Route::is('admin.ideas.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('admin.ideas.index') }}">
                    <span>{{ __('admin.ideas') }}</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('admin.comments.index') }}">
                    <span>{{ __('admin.comments') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <p> {{ __('ideas.language') }} </p>
        <hr>
        {{-- link to language switch button --}}
        <a href="{{ route('lang', 'en') }}" class="btn btn-link btn-sm">{{ __('ideas.en') }}</a>
        <a href="{{ route('lang', 'bn') }}" class="btn btn-link btn-sm">{{ __('ideas.bn') }}</a>
    </div>
</div>
