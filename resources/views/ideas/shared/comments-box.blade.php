<div>
    {{-- comment input --}}
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            {{-- display error if form validation fails --}}
            @error('content')
                <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    {{-- all comments --}}
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">
                        <a class="link-underline link-underline-opacity-0"
                            href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </h6>
                    <small class="fs-6 fw-light text-muted">
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <div class="text-center">
            No Comments found.
        </div>
    @endforelse
</div>
