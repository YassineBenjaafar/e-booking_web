<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    private $client_id;
    private $subject;
    private $message;

    protected $fillable = ['client_id','subject','message'];

    public function client(){
        return $this->belongsTo('App\Client');
    }
          
}
