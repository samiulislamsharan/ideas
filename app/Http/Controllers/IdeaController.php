<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate(
            [
                'content' => 'required|min:1|max:255',
            ]
        );

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('successMessage', 'Idea created successfully!');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'Unauthorized');
        }

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate(
            [
                'content' => 'required|min:1|max:255',
            ]
        );

        if (auth()->id() !== $idea->user_id) {
            abort(404, 'Unauthorized');
        }

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('successMessage', 'Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'Unauthorized');
        }

        $idea->delete();

        return redirect()->route('dashboard')->with('successMessage', 'Idea deleted successfully!');
    }
}