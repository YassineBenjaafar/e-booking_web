<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\State;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'last_name',
        'first_name',
        'rank',
        'ecode',
        'family_situation',
        'number_of_children',
        'starting_date_in_office',
        'user_id',
        'points'
    ];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
                        
    }
    
    public function client()
    {
        return $this->belongsTo('App\Client');
                        
    }

    public function getPoints(){
        $points = 0;
        if($this->family_situation =='single')
            $points +=2;
        if($this->family_situation =='married')
            $points +=4;
        if($this->family_situation =='married with kids'){
            $points+=($this->nombre_enfant * 2) + 5; 
        }
        if($this->rank =='Agent')
            $points +=4;
        if($this->grade =='Director')
            $points +=6;
        if($this->grade =='Executive Officer')
            $points +=8;

        $points += ((floor((strtotime(date("Y-m-d")) - strtotime($this->starting_date_in_office))/31556952))* 2);
        return $points;
    }

    public function shouldFeedBack(){
        $bookingsLog = $this->bookings;
        foreach($bookingsLog as $booking){
            if($booking->start_date <= Carbon::now() 
                    && $booking->state_id != 4 
                            && $booking->state_id != 5 
                                    && $booking->state_id != 2)
                $booking->state()->associate(4);
                $booking->update();
        }
        
        $bookings =   $this->bookings
                            ->where('state_id' , 4);

        foreach($bookings as $booking) {
            $this->client->notify(new \App\Notifications\FeedBack($booking));
            $booking->state()->associate(5);
            $booking->update();
        }

    } 
}
