<?php

namespace App;

use App\Entity;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = ['entity_id','state_id','start_date','end_date'];

    public function entity()
    {
        return $this->belongsTo('App\Entity');
    }

    public function state(){
        return $this->belongsTo('App\State');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public static function isBusySeason()
    {
        $busySeason = Setting::all()->last()->busySeason;
        return $busySeason;
    }

    public static function selection(Entity $entity)
    {
        $bookings = $entity->bookings->where('state_id','==',3)
        ->sortByDesc(function($booking,$key)
        {
            return $booking->employee->points;
        });
        $bookings = $bookings->values();
        foreach($bookings as $booking)
        {
            if( $booking->periodIn())
                $booking->state()->associate(2); // 2 canceled state
                
            else
                $booking->state()->associate(1); // 1 confirmed state
                $booking->save();
            $client = $booking->employee->client;
            $client->notify(new \App\Notifications\BookingNotification($booking));
        }
    }
    
    public function periodIn(){
        $bookings = $this->entity->bookings->where('state_id','==', 1);  // 1 confirmed state
        foreach($bookings as $booking)
        {
            if($this != $booking)
            {
                if((($this->start_date <= $booking->start_date) &&  $booking->start_date <= $this->end_date) 
                    || (($booking->start_date <= $this->start_date) &&  $this->start_date <= $booking->end_date))
                        return true;
                
            }
        }
        return false;
    }


    public function feedback()
    {
        return $this->belongsTo('App\FeedBack');
    }

    
}
