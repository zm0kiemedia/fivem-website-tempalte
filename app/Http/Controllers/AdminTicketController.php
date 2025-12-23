<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(15);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load('replies');
        return view('admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,closed,answered',
        ]);

        $ticket->update($validated);

        return redirect()->route('admin.tickets.show', $ticket)
            ->with('success', 'Ticket Status aktualisiert auf: ' . ucfirst($validated['status']));
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $ticket->replies()->create([
            'message' => $validated['message'],
            'replied_by' => 'Admin', // You can enhance this to use Auth::user()->name if you implement auth
            'is_admin' => true,
        ]);

        // Optionally update ticket status to 'answered'
        if ($ticket->status === 'open') {
            $ticket->update(['status' => 'answered']);
        }

        return redirect()->route('admin.tickets.show', $ticket)
            ->with('success', 'Antwort erfolgreich gesendet.');
    }
    
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket gelöscht.');
    }
}
