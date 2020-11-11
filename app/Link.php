<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
      'link_id', 'page_url', 'matter', 'service', 'link_url', 'at', 'start_date', 'user_id', 'site_id', 'content', 'domain_sub'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function post(){
      return $this->belongsTo('App\Post');
    }
    public function site(){
      return $this->belongsTo('App\Site');
    }
}
