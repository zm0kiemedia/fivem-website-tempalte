<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|min:5',
            'email' => 'required|email',
            'discord' => 'nullable|string|max:255',
            'category' => 'required',
            'message' => 'required|min:10',
        ]);

        $ticket = Ticket::create($validated);

        $viewLink = route('tickets.view', $ticket->access_token);
        
        return redirect()->route('tickets.create')
            ->with('success', 'Dein Ticket wurde erstellt!')
            ->with('access_link', $viewLink);
    }
}
