<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    private $libelle;
    
    public function maisons(){
        return $this->hasMany('App\Maison');
    }
    protected $fillable = ['libelle'];


   
    
}
