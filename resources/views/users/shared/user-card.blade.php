<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }} </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                @auth
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.edit', $user->id) }}" class="badge badge-primary text-bg-primary">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light"> {{ $user->bio }} </p>

            @include('users.shared.user-stats')

            @auth
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                @csrf
                                <div class="mt-3">
                                    <button class="btn btn-danger btn-sm"> UnFollow </button>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                @csrf
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-sm"> Follow </button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
