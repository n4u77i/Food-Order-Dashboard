<?php

namespace App;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class aktuellt extends Model
{
    protected $fillable = [
        'name','main_image','description'
    ];
    public function setImageAttribute($value)
    {
       $this->attributes['main_image'] = ImageHelper::saveImage($value,'/images/aktuellt/');
   }
}
