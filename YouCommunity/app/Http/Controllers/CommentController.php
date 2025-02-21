<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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

        // return redirect()->route('event.show', ['event_id' => $request->event_id]);

        return redirect()->route('event.show', $request->event_id);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
