<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\EventUser;


class EventRegistrationController extends Controller
{

    // *****************************************************************************************************************************
    public function register(Request $request)
    {
        $userId = Auth::id();
        $eventId = $request->event_id;

        $exists = DB::table('event_user')
            ->where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
        }

        DB::table('event_user')->insert([
            'user_id' => $userId,
            'event_id' => $eventId,
            'date_inscription' => now(),
        ]);

        return back()->with('success', 'Inscription réussie à l\'événement !');
    }

    // *****************************************************************************************************************************
    public function unregister(Request $request, $event_id)
    {
        $userId = Auth::id();

        $registration = EventUser::where('user_id', $userId)
            ->where('event_id', $event_id)
            ->first();

        if ($registration) {
            $registration->delete();

            return back()->with('success', 'Désinscription réussie de l\'événement.');
        } else {
            return back()->with('error', 'Vous n\'êtes pas inscrit à cet événement.');
        }
    }

    // *****************************************************************************************************************************
    public function show(Event $event)
    {
        $users = EventUser::where('event_id', $event->id)
            ->with('user')->paginate(5);

        return view('allInscriptionEvent', compact('event', 'users'));
    }
    // *****************************************************************************************************************************
    public function showAll(Event $event)
    {
        $myinscriptions = EventUser::where('user_id', Auth::id())
            ->with('user')
            ->with('event')->paginate(4);

            // dd($events);

        return view('mesInscriptions', compact('myinscriptions'));
    }

    // *****************************************************************************************************************************
    public function destroy(Request $request, $event_id)
    {
        $userId = $request->user_id;

        $registration = EventUser::where('user_id', $userId)
            ->where('event_id', $event_id)
            ->first();

        if ($registration) {
            $registration->delete();

            return back()->with('success', 'Désinscription réussie de l\'événement.');
        } else {
            return back()->with('error', 'Vous n\'êtes pas inscrit à cet événement.');
        }
    }
}
