<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('dashboard') }}">
                    <span>{{ __('ideas.home') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('feed') }}">
                    <span>{{ __('ideas.feed') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                    href="{{ route('terms') }}">
                    <span>{{ __('ideas.terms') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        {{-- link to language switch button --}}
        <a href="{{ route('lang', 'en') }}" class="btn btn-link btn-sm">{{ __('ideas.en') }}</a>
        <a href="{{ route('lang', 'bn') }}" class="btn btn-link btn-sm">{{ __('ideas.bn') }}</a>
    </div>
</div>
