<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisWebsiteController extends Controller
{
    public function data() {
    	$jenisWebsite = DB::table('jns_website')->get();

    	return view('pages.jenis-website.jenis-website-data', compact('jenisWebsite'));
    }
}
