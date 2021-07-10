<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
'title','image'
    ];
    public function setImageAttribute($value)
    {    
       $this->attributes['image'] = ImageHelper::saveImage($value,'/images/home/');
   }
}
