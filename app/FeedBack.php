<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $fillable = [
        'note', 'commentary'];

    
    protected $table = 'feedbacks';


    public function booking()
    {
        return $this->hasOne('App\Booking');
    }
}
