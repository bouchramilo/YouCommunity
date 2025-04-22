<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Notifications\NouvelleNotification;
use Illuminate\Support\Facades\Notification;


class InvitationController extends Controller
{
    // ***********************************************************************************************************************************
    public function index(Event $event)
    {
        $users = User::whereNotIn('id', function ($query) use ($event) {
            $query->select('user_id')
                ->from('event_invitations')
                ->where('event_id', $event->id);
        })->get();

        return view('inviterPage', compact('users', 'event'));
    }

    // ***********************************************************************************************************************************
    public function show()
    {
        $user = Auth::user();
        $myinvitations = $user->invitations;
        // dd( $myinvitations);

        return view('mesInvitations', compact('myinvitations'));
    }

    // ***********************************************************************************************************************************
    public function store(Request $request, Event $event)
    {
        // dd($event, $request);
        DB::table('event_invitations')->insert([
            'user_id' => $request->user_id,
            'event_id' => $event->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // send email
        $user = User::find($request->user_id);
        $message = "Nous avons le plaisir de vous inviter à notre événement spécial '$event->title', qui se tiendra le '$event->dateHeure' au '$event->lieu'.";
        Notification::send($user, new NouvelleNotification($message));


        return redirect(route('event.show.inviter', $event->id));
    }

    // ***********************************************************************************************************************************
    public function showAll(Event $event)
    {
        $invitations = $event->invitedUsers()->withPivot('status')->get();

        // dd($invitations);
        return view('eventInvitation', compact('invitations', 'event'));
    }


    // ***********************************************************************************************************************************
    public function statusInv(Request $request, Event $event)
    {
        $user = Auth::user();

        if (!$user->invitations()->where('event_id', $event->id)->exists()) {
            return back()->with('error', "Vous n'avez pas d'invitation pour cet événement.");
        }

        $user->invitations()->updateExistingPivot($event->id, [
            'status' => $request->status,
        ]);

        return back()->with('success', 'Statut de l’invitation mis à jour avec succès.');
    }
}
