<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListWebsite extends Model
{
    protected $table = 'list_website';
    protected $guarded = ['id'];
    

    public function user() {
    	return $this->belongsTo('App\User', 'id_pelanggan');
    }

    public function jenisWebsite() {
    	return $this->belongsTo('App\JenisWebsite', 'id_jenis_website');
    }
}
