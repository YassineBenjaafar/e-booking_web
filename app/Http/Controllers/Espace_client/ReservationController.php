<?php

namespace App\Http\Controllers\Espace_client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Centre;
use App\Maison;
use App\Agenda;
use App\Reservation;
use Auth;
use PDF;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index(Request $request)
    {
           return view('espace_client.reservation.index', ['maisons' => $maisons]);
    }

    public function getMaisonsbyCentre(Centre $centre){
        $maisons = $centre->maisons;
        return view('espace_client.reservation.maisons', [ 'maisons' => $maisons]);
        
    }

    public function getMaison(Maison $maison){
        $user = Auth::guard("client")->user();
        $salarie = $user->salarie;

        $reservationsConfirmer = $maison->reservations->where('etat_id','==', 1);
        $salarieReservationArchiver = $salarie->reservations->where('etat_id','==', 6);
        $salarieReservationEnCours = $salarie->reservations->where('etat_id','==', 3);

        $resultDisabled = array();
        foreach($reservationsConfirmer as $reservation){
                    $agenda = new Agenda(['date_debut'=> $reservation->date_debut,'date_fin'=> $reservation->date_fin]);
                    array_push($resultDisabled,$agenda);
        }
        foreach($salarieReservationArchiver as $reservation){
            $agenda = new Agenda(['date_debut'=> $reservation->date_debut,'date_fin'=> $reservation->date_fin]);
            array_push($resultDisabled,$agenda);
        }
        foreach($salarieReservationEnCours as $reservation){
            $agenda = new Agenda(['date_debut'=> $reservation->date_debut,'date_fin'=> $reservation->date_fin]);
            array_push($resultDisabled,$agenda);
        }

        $agendasDisabled = Agenda::convertTo($resultDisabled);
        $urls = $maison->getImagesUrls();
        $result = $maison->agendas;
       
        $agendas = Agenda::convertTo($result);
        return view('espace_client.reservation.maison', [ 'maison' => $maison, 'urls' => $urls,'agendas' => $agendas,'agendasDisabled'=>$agendasDisabled]); 
    }

    public function envoyer(Request $request,Maison $maison){
        $user = Auth::guard("client")->user();
        $salarie = $user->salarie;
        $isHautSaison = Reservation::isHautSaison();
        $personsAuthorized = $salarie->nombre_enfant + 2;
        $this->validate($request,[
            'nombrePersonne' => 'required|lte:'.$personsAuthorized.'|gt:0'
        ]);
        if($request->etat === 'envoyer'){
            $etat = $isHautSaison? 3 : 1;
        }else if ($request->etat==='archiver'){
            $etat = 6 ;
        }
        $montant = $request->days * $maison->prix_par_nuit;

        $reservation = new Reservation();
        $reservation->etat()->associate($etat);
        $reservation->maison()->associate($request->maison);
        $reservation->salarie()->associate($salarie);
        $reservation->date_debut = $request->startDate;
        $reservation->date_fin = $request->endDate;
        $reservation->montant = $montant;
        $reservation->save();  
        
        if($etat != 6)
            $user->notify(new \App\Notifications\reservations($reservation));

        return redirect('/')->with('response','Votre reservation est '.$reservation->etat->name) ;

    }
    public function getReservations(){
        $user = Auth::guard('client')->user();
        $salarie = $user->salarie;
        $reservations = $salarie->reservations->except(['etat_id', 5]);
        return view('espace_client.reservation.index', [ 'reservations' => $reservations]);


    }

    public function getReport(Reservation $reservation){

        $data = ['reservation' => $reservation];
        $pdf = PDF::loadView('espace_client.reservation.report', $data);
        return $pdf->stream();
    }

    public function supprimer(Request $request){
        $user = Auth::guard("client")->user();
        $reservation = Reservation::find($request->reservation_id);
        $this->authorize('delete', $reservation);
        $reservation->delete();
        if($reservation->etat_id != 6 )
                $user->notify(new \App\Notifications\reservations($reservation));
        return redirect('/reservations')->with('status','Reservation deleted successfully');
    }

    public function annuler(Request $request){
        $reservation = Reservation::find($request->reservation_id);
        $user = Auth::guard("client")->user();
        $this->authorize('update', $reservation);
        $date_debut = strtotime($reservation->date_debut);
        $now = strtotime(date("Y-m-d"));
        $range = ($date_debut - $now)/86400;
        $points = $reservation->salarie->getPoints();
        $points = $range < 10 ? $points - 3 : $points;
        $reservation->salarie->points = $points;
        $reservation->etat_id = 2;
        $reservation->push();
        if($reservation->etat_id != 6 )
             $user->notify(new \App\Notifications\reservations($reservation));

        return redirect('/reservations')->with('status','Reservation updated successfully');
    }
   
}
