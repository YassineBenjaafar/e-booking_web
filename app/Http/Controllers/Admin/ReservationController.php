<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\Maison;
use App\Parametre;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($etat)
    {
        
        $reservations = Reservation::all();
        $hauteSaison = Parametre::all()->last()->hauteSaison;
        return view('admin/reservation.index',['reservations'=>$reservations,'hauteSaison'=>$hauteSaison]);
    }

    public function affecter(){
        $reservationEnCoursCount = count(Reservation::all()->where('etat_id', 3)); // 3 etat en cours
        if($reservationEnCoursCount==0)
            return redirect()->route('admin.reservations.index','haute')
            ->with('fail','aucune reservations en cours !');

        $maisons = Maison::all()->whereIn('id',Reservation::all()->pluck('maison_id'));
        foreach($maisons as $maison){
            Reservation::selection($maison);
        }
        return redirect()->route('admin.reservations.index','haute')
                         ->with('success','Reservations affected successfully');
    }

    public function changerHauteSaison(Request $request){
        $parametre = new Parametre();
        if($request->hauteSaison =='true'){
            $value = 1;
            $massage = 'La haute saison est activé';
        }else{
            $value = 0;
            $massage = 'La haute saison est desactivé';
        }
        $parametre->hauteSaison =  $value;
        $parametre->save();
        return response()->json(['success'=> $massage ]);
    }
  
}
