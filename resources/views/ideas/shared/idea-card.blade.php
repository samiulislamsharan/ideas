<div class="card">
    {{-- username --}}
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a class="link-underline link-underline-opacity-0"
                            href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            @auth
                @if (Auth::id() === $idea->user->id)
                    <div>
                        <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('ideas.edit', $idea->id) }}"
                                class="badge text-bg-primary link-underline link-underline-opacity-0">edit
                            </a>
                            <a href="{{ route('ideas.show', $idea->id) }}"
                                class="badge text-bg-primary link-underline link-underline-opacity-0">view
                            </a>
                            <button class="ms-1 btn btn-danger btn-sm"> X </button>
                        </form>
                    </div>
                @else
                    <div>
                        <a href="{{ route('ideas.show', $idea->id) }}"
                            class="badge text-bg-primary link-underline link-underline-opacity-0">view</a>
                    </div>
                @endif
            @endauth

            @guest
                <a href="{{ route('ideas.show', $idea->id) }}"
                    class="badge text-bg-primary link-underline link-underline-opacity-0">view</a>
            @endguest
        </div>
    </div>
    {{-- ideas section --}}
    <div class="card-body">

        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3" placeholder="Any idea today?">{{ $idea->content }}</textarea>
                    {{-- display error if form validation fails --}}
                    @error('content')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        {{-- like and date --}}
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
