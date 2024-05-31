{{-- render notifications with follower name, timestamp, and mark as read button --}}

@foreach (auth()->user()->notifications as $notification)
    @if ($notification->type === 'App\Notifications\UserFollowedNotification')
        @include('notification.shared.follow-notification')
    @elseif ($notification->type === 'App\Notifications\IdeaLikeNotification')
        @include('notification.shared.like-notification')
    @endif
@endforeach
