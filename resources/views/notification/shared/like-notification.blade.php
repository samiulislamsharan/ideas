<div class="card mb-2">
    <div class="card-body {{ $notification->unread() ? 'bg-warning text-black' : '' }}">
        <div class="d-flex justify-content-between">
            <div>
                <span class="fa-solid fa-heart"></span>
                <a href="{{ route('users.show', $notification->data['liker_id']) }}">
                    <span class="fw-bold">{{ $notification->data['liker_name'] }}</span>
                </a>
            </div>
            <div>
                <span class="text-muted fst-italic">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        <div>
            <span class="fw-bold">Liked your Idea:</span>
            {{-- render a short peice of idea_content and link to it --}}
            <a href="{{ route('ideas.show', $notification->data['idea_id']) }}">
                <span class="fw-light">{{ Str::limit($notification->data['idea_content'], 50) }}</span>
            </a>
        </div>

        <div class="d-flex justify-content-end">
            {{-- if the notification is unread, show the mark as read button --}}
            @if ($notification->unread())
                <form action="{{ route('notification.read', $notification) }}" method="GET">
                    @csrf
                    @method('GET')
                    <input type="submit" value="Mark as read" class="btn btn-sm btn-outline-light mt-2">
                </form>
            @endif
        </div>
    </div>
</div>
