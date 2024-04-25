{{-- render notifications with follower name, timestamp, and mark as read button --}}

@foreach (auth()->user()->notifications as $notification)
    <div class="card mb-2">
        <div class="card-body {{ $notification->unread() ? 'bg-info' : '' }}">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="fa-solid fa-user-plus"></span>
                    <a
                        href="{{ route('users.show', $notification->data['follower_id']) }}>
                        <span class="fw-bold">{{ $notification->data['follower_name'] }}</span>
                    </a>
                </div>
                <div>
                    <span class="text-muted fst-italic">
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
            <div>
                <span class="fw-bold">{{ __('ideas.follow_message') }}</span>
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
@endforeach
