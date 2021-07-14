<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded =[];
    
    public function user(){
      return $this ->belongsTo(User::class);
    }
    public function category(){
        return $this ->belongsTo(category::class);
      } 
      public function replies(){
        return $this ->hasMany(Reply::class)->orderBy('created_at','DESC');
      } 
      public function getRouteKeyName(){
        return 'slug';
      }
      public function scopeLatest($query){
          return $query->orderBy('created_at','DESC') ;
      }

}
