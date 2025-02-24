<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;
use Carbon\Carbon;
use App\Models\EventUser;


class EventController extends Controller
{
    // ***********************************************************************************************************************************
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(9);
        return view('allevents', compact('events'));
    }

    // ***********************************************************************************************************************************
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // ***********************************************************************************************************************************
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'maxParticipants' => ['required', 'integer'],
            'dateHeure' => ['required', 'date'],
            'lieu' => ['required', 'string', 'max:255'],
            'categorie' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $photoPath = $request->file(key: 'photo')->store('photos', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'maxParticipants' => $request->maxParticipants,
            'dateHeure' => $request->dateHeure,
            'lieu' => $request->lieu,
            'photo' => $photoPath,
            'categorie' => $request->categorie,
            'user_id' => Auth::id(),
        ]);

        return redirect(route('events.myEvents', absolute: false));
    }

    // ***********************************************************************************************************************************
    /**
     * Display All my events.
     */
    public function showMyEvents()
    {
        $userId = Auth::id();
        $events = Event::where('user_id', $userId)->paginate(3);

        return view('mesEventsCreate', compact('events'));
    }

    // ***********************************************************************************************************************************
    /**
     * Display the specified resource.
     */

    public function show(Event $event)
    {
        $comments = $event->comments()->paginate(5);

        $is_register = EventUser::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists() ? 1 : 0;

        $my_comment = Comment::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists() ? 1 : 0;

        $users = EventUser::where('event_id', $event->id)
            ->with('user')->get();

        return view('detailsEvent', compact('event', 'comments', 'users', 'is_register', 'my_comment'));
    }


    // ***********************************************************************************************************************************
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('editEvent', compact('event'));
    }

    // ***********************************************************************************************************************************
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // dd($event, $request);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'maxParticipants' => ['required', 'integer'],
            'dateHeure' => ['required', 'date'],
            'lieu' => ['required', 'string', 'max:255'],
            'categorie' => ['required', 'string', 'max:255'],
            // 'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : $event->photo;

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'maxParticipants' => $request->maxParticipants,
            'dateHeure' => $request->dateHeure,
            'lieu' => $request->lieu,
            'photo' => $photoPath,
            'categorie' => $request->categorie,
            // 'status' => $request->status,
        ]);

        return redirect(route('events.myEvents', absolute: false));
    }

    //    ***********************************************************************************************************************************
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (Auth::id() !== $event->user_id) {
            return redirect()->route('events.myEvents')->with('error', "Vous n'avez pas le droit de supprimer cet événement.");
        }

        $event->delete();

        return redirect()->route('events.myEvents')->with('success', 'Événement supprimé (archivé) avec succès.');
    }

    // ***********************************************************************************************************************************
    public function updateStatus(Request $request, Event $event)
    {
        $event->status = $request->status;
        $event->save();

        return back()->with('success', 'Statut de l’événement mis à jour avec succès.');
    }
}
