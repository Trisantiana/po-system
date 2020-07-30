<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebExpired extends Model
{
	protected $table = 'web_expired';
    protected $guarder = ['id'];

    
}
