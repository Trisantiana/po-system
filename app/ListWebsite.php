<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListWebsite extends Model
{
    protected $table = 'list_website';
    protected $guarded = ['id'];

    public function user() {
    	return $this->hasMany('App\User');
    }

    public function jenisWebsite() {
    	return $this->hasMany('App\JenisWebsite');
    }
}
