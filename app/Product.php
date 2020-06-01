<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['title','description','photo_id','price','stock'];
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
