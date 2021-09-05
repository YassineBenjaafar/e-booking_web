<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $fillable = [
        'name',
    ];


    public function reservation(){
        return $this->hasOne('App\Reservation');
    }
}
