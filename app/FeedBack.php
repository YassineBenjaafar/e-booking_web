<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $fillable = [
        'note', 'commentaire'];

    
    protected $table = 'feedbacks';


    public function reservation()
    {
        return $this->hasOne('App\Reservation');
    }
}
