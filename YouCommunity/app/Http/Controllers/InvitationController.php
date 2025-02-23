<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InvitationController extends Controller
{
    public function index()
    {
        //
    }

    public function show()
    {
        // Récupérer l'utilisateur
        $user = User::findOrFail(Auth::id());

        // Récupérer toutes les invitations reçues
        $myinvitations = $user->invitations()->get();
        return view('mesInvitations', compact('myinvitations'));

    }
}
