<?php

namespace App\Http\Controllers\Espace_client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Center;
use App\Entity;
use App\Agenda;
use App\Booking;
use Auth;
use PDF;

class BookingController extends Controller
{
    public function index(Request $request)
    {
           return view('espace_client.booking.index', ['entities' => $entities]);
    }

    public function getEntitiesbyCenter(Center $center)
    {
        $entities = $center->entities;
        return view('espace_client.booking.entities', [ 'entities' => $entities]);
        
    }

    public function getEntity(Entity $entity)
    {
        $user = Auth::guard("client")->user();
        $employee = $user->employee;

        $confirmedBookings = $entity->bookings->where('state_id','==', 1);
        $employeeArchivedBookings = $employee->bookings->where('state_id','==', 6);
        $employeeInProgressBookings = $employee->bookings->where('state_id','==', 3);

        $resultDisabled = array();

        foreach($confirmedBookings as $booking)
        {
            $agenda = new Agenda(['start_date'=> $booking->start_date,'end_date'=> $booking->end_date]);
            array_push($resultDisabled,$agenda);
        }
        
        foreach($employeeArchivedBookings as $booking)
        {
            $agenda = new Agenda(['start_date'=> $booking->start_date,'end_date'=> $booking->end_date]);
            array_push($resultDisabled,$agenda);
        }

        foreach($employeeInProgressBookings as $booking){
            $agenda = new Agenda(['start_date'=> $booking->start_date,'end_date'=> $booking->end_date]);
            array_push($resultDisabled,$agenda);
        }

        $agendasDisabled = Agenda::convertTo($resultDisabled);
        $urls = $entity->getImagesUrls();
        $result = $entity->agendas;
       
        $agendas = Agenda::convertTo($result);
        return view('espace_client.booking.entity', [ 'entity' => $entity, 'urls' => $urls,'agendas' => $agendas,'agendasDisabled'=>$agendasDisabled]); 
    }

    public function send(Request $request,Entity $entity)
    {
        $user = Auth::guard("client")->user();
        $employee = $user->employee;
        $isBusySeason = Booking::isBusySeason();
        $state = -1;

        if($request->state === 'send')
            $state = $isBusySeason? 3 : 1;
        
        if ($request->state ==='archive')
            $state = 6 ;

        $price = ($request->days + 1) * $entity->price;
        $booking = new Booking();
        $booking->state()->associate($state);
        $booking->entity()->associate($request->entity);
        $booking->employee()->associate($employee);
        $booking->start_date = $request->startDate;
        $booking->end_date = $request->endDate;
        $booking->amount = $price;
        $booking->save();  
        
        if($state != 6)
            $user->notify(new \App\Notifications\BookingNotification($booking));

        return redirect('/')->with('response','Your booking state is : '.$booking->state->name) ;

    }

    public function getBookings()
    {
        $user = Auth::guard('client')->user();
        $employee = $user->employee;
        $bookings = $employee->bookings->except(['state_id', 5]);

        return view('espace_client.booking.index', [ 'bookings' => $bookings]);
    }

    public function getReport(Booking $booking)
    {
         $data = ['booking' => $booking];
         $pdf = PDF::loadView('espace_client.booking.report', $data);
         return $pdf->stream("report.pdf");
    }

    public function delete(Request $request)
    {
        $user = Auth::guard("client")->user();
        $booking = Booking::find($request->booking_id);
        
        //$this->authorize('delete', $booking);
        $booking->delete();
        if($booking->state_id != 6 )
                $user->notify(new \App\Notifications\BookingNotification($booking));

        return redirect('/bookings')->with('status','Booking deleted successfully');
    }

    public function cancel(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $user = Auth::guard("client")->user();
        //$this->authorize('update', $booking);
        $start_date = strtotime($booking->start_date);
        $now = strtotime(date("Y-m-d"));
        $range = ($start_date - $now)/86400;
        $points = $booking->employee->getPoints();
        $points = $range < 10 ? $points - 3 : $points;
        $booking->employee->points = $points;
        $booking->state_id = 2;
        $booking->push();

        if($booking->state_id != 6 )
             $user->notify(new \App\Notifications\BookingNotification($booking));

        return redirect('/bookings')->with('status','Booking updated successfully');
    }
   
}
