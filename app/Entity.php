<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Entity extends Model
{
    private $center_id;
    private $label;
    private $description;
    private $price;
    private $details;
    
    protected $fillable = ['center_id','label','description','price', 'details'];

    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }

    
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function center()
    {
        return $this->belongsTo('App\Center');
    }
    
    public function getImagesUrls(){
        $paths = Storage::files('public/images/entities/'.$this->id);
        $urls = array_map(function($path) 
        {
            return 'storage' . substr($path,6);
        },$paths);

       if(count($urls) === 0) 
        {
            $alternative_path = Storage::files('public/images/other');
            $urls = array_map(function($path) {
            return  'storage' . substr($path,6);
            },$alternative_path);

        }

        return $urls;
    }
}
