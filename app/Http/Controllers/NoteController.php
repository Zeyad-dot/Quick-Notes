<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Show all notes for the authenticated user
    public function index()
    {
        $notes = Auth::user()->notes;
        return view('notes.index', compact('notes'));
    }

    // Show form to create a new note
    public function create()
    {
        return view('notes.create');
    }

    // Store a new note and log the creation
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note = Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index');
    }

    // Show a single note
    public function show(Note $note)
    {
        // Ensure the note belongs to the logged-in user
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notes.show', compact('note'));
    }

    // Show form to edit a note
    public function edit(Note $note)
    {
        // Ensure the note belongs to the logged-in user
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notes.edit', compact('note'));
    }

    // Update the note and log the update
    public function update(Request $request, Note $note)
    {
        // Ensure the note belongs to the logged-in user
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index');
    }

    // Delete the note and log the deletion
    public function destroy(Note $note)
    {
        // Ensure the note belongs to the logged-in user
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('notes.index');
    }

}
