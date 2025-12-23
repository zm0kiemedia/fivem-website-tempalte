<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketViewController extends Controller
{
    public function show($token)
    {
        $ticket = Ticket::where('access_token', $token)->firstOrFail();
        $ticket->load('replies');
        
        return view('tickets.view', compact('ticket'));
    }

    public function reply(Request $request, $token)
    {
        $ticket = Ticket::where('access_token', $token)->firstOrFail();
        
        $validated = $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $ticket->replies()->create([
            'message' => $validated['message'],
            'replied_by' => $ticket->email,
            'is_admin' => false,
        ]);

        return redirect()->route('tickets.view', $token)
            ->with('success', 'Deine Antwort wurde hinzugefügt.');
    }
}
