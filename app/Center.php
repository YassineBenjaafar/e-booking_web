<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Center extends Model
{
    private $label;
    
    public function entities()
    {
        return $this->hasMany('App\Entity');
    }
    
    protected $fillable = ['label', 'description'];
    

    public function getImagesUrls()
    {
        $paths = Storage::files('public/images/centers/'.$this->id);
        $urls = array_map(function($path) 
        {
            return  'storage' . substr($path,6);
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
