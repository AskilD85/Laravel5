<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function roles() {
        
    }
    public function users() {
        return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }
}
