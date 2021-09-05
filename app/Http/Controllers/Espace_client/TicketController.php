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

        $request->validate([
            'subject' => 'required|max:30',
            'message' =>'required|max:255',
        ],
        [
            'required' => 'The :attribute is required!'
        ]);

        $client = Auth::guard('client')->user();
        $ticket = new Ticket();

        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->client()->associate($client);
        $ticket->save();
        return redirect()->back()->with('ticketSent','Message send successfully');  

    }


    public function sendFeedback(Request $request)
    {
        $request->validate([
            'commentary' => 'required|max:255',
            'note' =>'required|gt:0',
        ]);
        
        $this->readNotification($request->notifID);
        $feedback = new FeedBack();
        $feedback->note = $request->note;
        $feedback->commentary = $request->commentary;
        $feedback->save();
        $booking = Reservation::find($request->bookingID);
        $booking->feedback()->associate($feedback);
        $booking->update();
        return redirect('/bookings')->with('response','Thanks for your feedback');
    }


    public function readNotification($id){
        $notification = Auth::guard('client')->user()->notifications->where('id',$id);
        if($notification)
            $notification->markAsRead();
        return redirect('/bookings');
    }

    


 
}
