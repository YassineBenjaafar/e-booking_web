<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Booking;
use App\Entity;
use App\Setting;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($etat)
    {
        $bookings = Booking::all();
        $busySeason = Setting::all()->last()->busySeason;
        return view('admin/booking.index',['bookings'=>$bookings,'busySeason'=>$busySeason]);
    }

    public function affect()
    {
        $bookingInProgressCount = count(Booking::all()->where('state_id', 3)); // 3 state in progress
        if($bookingInProgressCount == 0)
            return redirect()->route('admin.bookings.index','busy')
            ->with('fail','No bookings in progress !');

        $entities = Entity::all()->whereIn('id', Booking::all()->pluck('entity_id'));
        foreach($entities as $entity){
            Booking::selection($entity);
        }
        return redirect()->route('admin.bookings.index','haute')
                         ->with('success','Bookings affected successfully');
    }

    public function changeSeason(Request $request)
    {   
        $setting = new Setting();
        if($request->busySeason == 'true')
        {
            $value = 1;
            $massage = 'Busy season is activated';
        }
        else
        {
            $value = 0;
            $massage = 'Busy season is deactivated';
        }
        $setting->busySeason = $value;
        $setting->save();
        return response()->json(['success'=> $message ]);
    }
  
}
