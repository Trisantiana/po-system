<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisWebsite extends Model
{
    protected $table = 'jns_website';
    protected $guarded = ['id'];

    public function listWebsite() {
    	return $this->belongsTo('App\ListWebsite');
    }
}