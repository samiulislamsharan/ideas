<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        request()->validate(
            [
                'content' => 'required|min:1|max:255',
            ]
        );

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content', '');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('successMessage', 'Comment posted successfully!');
    }
}
