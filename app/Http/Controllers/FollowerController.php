<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserFollowNotification;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        // follow the user, create a notification and return the notification card and redirect back
        $follower = auth()->user();

        $follower->followings()->attach($user);

        if (auth()->user()) {
            $user->notify(new UserFollowNotification($follower));
        }

        return redirect()->route('users.show', $user->id)->with('success', "Followed successfully!");
    }

    public function unfollow(User $user)
    {
        // unfollow the user, delete the notification and redirect back
        $follower = auth()->user();

        $follower->followings()->detach($user);

        $user->notifications()->where('type', UserFollowNotification::class)->where('data->follower_id', $follower->id)->delete();

        return redirect()->route('users.show', $user->id)->with('success', "Unfollowed successfully!");
    }
}
