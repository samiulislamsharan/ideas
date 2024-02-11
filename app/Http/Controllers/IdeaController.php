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
        $this->authorize('update', $idea);

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = request()->validate(
            [
                'content' => 'required|min:1|max:255',
            ]
        );

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('successMessage', 'Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return redirect()->route('dashboard')->with('successMessage', 'Idea deleted successfully!');
    }
}
