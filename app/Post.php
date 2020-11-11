<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'matter', 'service', 'plan', 'staff', 'start_date', 'end_date', 'user_id', 'content'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function links(){
      return $this->hasMany('App\Link');
    }
}
