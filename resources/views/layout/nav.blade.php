<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1">
            </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class=" {{ Route::is('login') ? 'active' : '' }} nav-link" aria-current="page"
                            href="{{ route('login') }}">{{ __('ideas.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class=" {{ Route::is('terms') ? 'active' : '' }} nav-link"
                            href="{{ route('register') }}">{{ __('ideas.register') }}</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Route::is('notifications') ? 'active' : '' }}" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fas fa-bell"></span>
                            {{-- get notification count --}}
                            @if (Auth::user()->unreadNotifications->count() > 0)
                                <span class="badge bg-danger rounded-start-pill">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu" style="min-width:20rem">
                            @include('notification.notification-card')
                            {{-- see more notifications --}}
                            <li><a class="dropdown-item" href="{{ route('notifications') }}">{{ __('ideas.see_more') }}</a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->is_admin)
                        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span class="fas fa-bolt"> </span>
                            {{ __('admin.admin') }}
                        </a>
                    @endif
                    <li class="nav-item">
                        <a class="{{ Route::is('profile') ? 'active' : '' }} nav-link"
                            href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="{{ __('ideas.logout') }}" class="btn btn-danger btn-sm">
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
