<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Notifications\IdeaLikeNotification;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();

        $liker->likes()->attach($idea);

        if (auth()->user()) {
            $idea->user->notify(new IdeaLikeNotification($idea));
        }

        return redirect()->route('dashboard')->with('success', "Liked successfully!");
    }

    public function unlike(Idea $idea)
    {
        $liker = auth()->user();

        $liker->likes()->detach($idea);

        $idea->user->notifications()->where('type', IdeaLikeNotification::class)->where('data->idea_id', $idea->id)->delete();

        return redirect()->route('dashboard')->with('success', "Un-liked successfully!");
    }
}