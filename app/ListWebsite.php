<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListWebsite extends Model
{
    protected $table = 'list_website';
    // protected $guarded = ['id'];
    protected $fillable = array(
    	'id',
    	'id_pelanggan',
    	'nama_website',
    	'url_website',
    	'merk',
    	'wilayah',
    	'tgl_aktif',
    	'tgl_selesai',
    	'periode',
    	'status',
    	'id_jenis_website',
    );

    public function user() {
    	return $this->belongsTo('App\User', 'id_pelanggan');
    }

    public function jenisWebsite() {
    	return $this->belongsTo('App\JenisWebsite', 'id_jenis_website');
    }
}
