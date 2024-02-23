<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingIDs = auth()->user()->followings()->pluck('id');

        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })
            ->whereIn('user_id', $followingIDs)->latest()
            ->paginate(5);

        return view(
            'feed',
            [
                'ideas' => $ideas,
            ]
        );
    }
}
