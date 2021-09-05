<?php

namespace App;

use App\Maison;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
    protected $fillable = ['maison_id','etat_id','date_debut','date_fin'];

    public function maison()
    {
        return $this->belongsTo('App\Maison');
    }

    public function etat(){
        return $this->belongsTo('App\Etat');
    }

    public function salarie()
    {
        return $this->belongsTo('App\Salarie');
    }
    //
    public static function isHautSaison(){
        $hauteSaison = Parametre::all()->last()->hauteSaison;
        return $hauteSaison;
    }
    public static function selection(Maison $maison){
        $reservations = $maison->reservations->where('etat_id','==',3)
        ->sortByDesc(function($reservation,$key){
            return $reservation->salarie->points;
        });
        // re index array
        $reservations = $reservations->values();
        foreach($reservations as $reservation){
            if( $reservation->periodIn())
                $reservation->etat()->associate(2); // 2 etat annulé
                
            else
                $reservation->etat()->associate(1); // 1 etat confirmé
                $reservation->save();
            $client = $reservation->salarie->client;
            $client->notify(new \App\Notifications\reservations($reservation));
        }


    }
    public function periodIn(){
        $reservations = $this->maison->reservations->where('etat_id','==', 1);  // 1 etat confirmé
        foreach($reservations as $reservation){
            if($this != $reservation){
                if((($this->date_debut <= $reservation->date_debut) &&  $reservation->date_debut <= $this->date_fin) 
                || (($reservation->date_debut <= $this->date_debut) &&  $this->date_debut <= $reservation->date_fin)){
                return true;
                }
            }
        }
        return false;
    }


    public function feedback(){
        return $this->belongsTo('App\FeedBack');
    }

    
}
