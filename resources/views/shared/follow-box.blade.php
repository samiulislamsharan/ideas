<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __('ideas.who_to_follow') }}</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }}">
                        <img style="width: 50px" class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}"
                            alt="{{ $user->name }}">
                    </a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->username }}</p>
                </div>
                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#">
                    @auth
                        @if (Auth::id() !== $user->id)
                            <div class="mt-3">
                                @if (Auth::user()->follows($user))
                                    
                                @else
                                    <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                        @csrf
                                        <div class="mt-3">
                                            <button class="btn btn-sm fa-solid fa-plus">
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endauth
                </a>
            </div>
        @endforeach
        <div class="d-grid mt-3">
            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
        </div>
    </div>
</div>
