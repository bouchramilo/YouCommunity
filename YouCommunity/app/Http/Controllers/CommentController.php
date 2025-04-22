<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => ['required', 'string'],
        ]);

        Comment::create([
            'contenu' => $request->contenu,
            'event_id' => $request->event_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('event.show', $request->event_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $comment = Comment::find($request->comment_id);

        $event = $comment->event_id;
        $comment->delete();
        return redirect()->route('event.show', $event);
    }
}
