<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Maison extends Model
{
    private $centre_id;
    private $libelle;
    private $description;
    private $nombre_chambre;
    private $prix_par_nuit;
    private $capacite;
    //
    protected $fillable = ['centre_id','libelle','description','nombre_chambre','prix_par_nuit','capacite'];

    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }

    
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function centre()
    {
        return $this->belongsTo('App\Centre');
    }
    //
    public function getImagesUrls(){
        $paths = Storage::files('public/images/maisons/'.$this->id);
        $urls = array_map(function($path) {
            return  'storage' . substr($path,6);
          },$paths);

        if(count($urls) === 0)
          $urls = array("");

          return $urls;
    }
}
