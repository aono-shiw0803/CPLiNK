<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
      'site_name', 'domain', 'login_url', 'site_id', 'password', 'ip', 'google_id', 'google_pass', 'ftp_host', 'ftp_user', 'ftp_pass', 'file_dir', 'company', 'user_id', 'post_id', 'content'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function links(){
      return $this->hasMany('App\Link');
    }
}
