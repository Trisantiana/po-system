<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany('App\User');
        
    }
}
