<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use Carbon\Carbon;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all()->sortBy('created_at');
        return view('admin/ticket.index',['tickets'=>$tickets]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Ticket $ticket)
    {
        $ticket->read_at =  Carbon::now();
        $ticket->update();
        return View('admin/ticket.consult',['ticket'=>$ticket]);
    }

    public function edit(Ticket $ticket)
    {
        return view('admin/ticket.reply',['ticket'=>$ticket]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()
                         ->with('success','ticket deleted successfully');
    }

    public function reply(Ticket $ticket , Request $request){
        $client = $ticket->client;
        $client->notify(new \App\Notifications\ReplyTicketNotification($ticket , $request->subject , $request->message));
        return redirect()->route('admin.tickets.index')
        ->with('success','reply sent successfully');
      
    }
}
