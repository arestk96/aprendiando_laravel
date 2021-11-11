<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $table = 'posts';

  //Relacion de uno a muchos pero inversa
  public function user(){
    return $this->belongsTo('App\User', 'user_id');
  }
  public function category(){
    return $this->belongsTo('App\category', 'category_id');
  }
}
