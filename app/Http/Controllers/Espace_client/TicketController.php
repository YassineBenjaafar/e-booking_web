<?php

namespace App\Http\Controllers\Espace_client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Ticket;
use App\FeedBack;
use App\Reservation;
use Illuminate\Notifications\Notification;

class TicketController extends Controller
{
    public function postTicket(Request $request){
     
        $client = Auth::guard('client')->user();
        $ticket = new Ticket();
        $request->validate([
            'sujet' => 'required|max:30',
            'message' =>'required|max:255',
        ],
        [
            'required' => 'le :attribute est vide .'
        ]);

        $ticket->sujet = $request->sujet;
        $ticket->message = $request->message;
        $ticket->client()->associate($client);
        $ticket->save();
        return redirect()->back()->with('ticketSent','message envoyer avec success');  

    }


    public function sendFeedback(Request $request)
    {
        $request->validate([
            'commentaire' => 'required|max:255',
            'note' =>'required|gt:0',
        ]);
        
        $this->readNotification($request->notifID);
        $feedback = new FeedBack();
        $feedback->note = $request->note;
        $feedback->commentaire = $request->commentaire;
        $feedback->save();
        $reservation = Reservation::find($request->reservationID);
        $reservation->feedback()->associate($feedback);
        $reservation->update();
        return redirect('/reservations')->with('response','merci pour votre feedback');
    }


    public function readNotification($id){
        $notification = Auth::guard('client')->user()->notifications->where('id',$id);
        if($notification)
            $notification->markAsRead();
        return redirect('/reservations');
    }

    


 
}
