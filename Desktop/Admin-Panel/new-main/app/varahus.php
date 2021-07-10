<?php

namespace App;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class varahus extends Model
{
    protected $fillable = [
        'name','main_image','description','category_id'
    ];
    public function setImageAttribute($value)
    {
       $this->attributes['main_image'] = ImageHelper::saveImage($value,'/images/varahus/');
   }
}
