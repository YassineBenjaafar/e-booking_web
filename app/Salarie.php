<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Etat;

class Salarie extends Model
{
    protected $table = 'salaries';
    protected $fillable = ['nom','prenom','grade','matricule','situation_famillial','nombre_enfant','date_prise_fonction','user_id','points'];
    //protected $guarded = ['*'];



    public function reservations()
    {
        return $this->hasMany('App\Reservation');
                        
    }
    
    public function client()
    {
        return $this->belongsTo('App\Client');
                        
    }

    public function getPoints(){
        $points = 0;
        if($this->situation_famillial =='celibtaire')
            $points +=2;
        if($this->situation_famillial =='marie(e)')
            $points +=4;
        if($this->situation_famillial =='marie(e) avec enfants'){
            $points+=($this->nombre_enfant * 2) + 5; 
        }
        if($this->grade =='Agent')
            $points +=4;
        if($this->grade =='Directeur')
            $points +=6;
        if($this->grade =='Cadre')
            $points +=8;
        $points += ((floor((strtotime(date("Y-m-d")) - strtotime($this->date_prise_fonction))/31556952))* 2);
        return $points;
    }

    public function shouldFeedBack(){
        $reservationsLog = $this->reservations;
        foreach($reservationsLog as $reservation){
            if($reservation->date_fin <= Carbon::now() && $reservation->etat_id != 4 && $reservation->etat_id != 5 && $reservation->etat_id != 2)
                $reservation->etat()->associate(4);
                $reservation->update();
        }
        
        $reservations =   $this->reservations
                            ->where('etat_id' , 4);

        foreach($reservations as $reservation) {
            $this->client->notify(new \App\Notifications\feedback($reservation));
            $reservation->etat()->associate(5);
            $reservation->update();
        }

    } 
}
