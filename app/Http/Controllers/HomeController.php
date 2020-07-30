<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\ListWebsite;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function dashboard(){
        $user = User::all();
        $listWebsites = ListWebsite::all();
        // dd($listWebsites);
        $listWebsite = DB::table('list_website')
        ->count('id');
        $listWebsiteSewa = DB::table('list_website')
        ->where('id_jenis_website', '=', 1)
        ->count('id');
        // $webExpired = DB::table('list_website')->where('expired_at', '<=', 31)->latest()->get();
        // $tglExpired = new DateTime($listWebsites->tgl_selesai);
        // $listExpired = json_decode($listWebsites->expired_at, true);
        // $listExpired = $listWebsites->expired_at['days'];
        // dd($listExpired);
        $tglSekarang = date('Y-m-d');
        $webExpired = ListWebsite::where('tgl_selesai', '<=', $tglSekarang)->latest()->get();

        // $webSelesai = ListWebsite::select('tgl_selesai')->get();
        $webYangAkanExpired = ListWebsite::where('expired_at', '<=', 'tgl_selesai')->latest()->get();

        return view('dashboard', compact('listWebsite', 'listWebsiteSewa', 'webExpired', 'user', 'tglSekarang', 'webYangAkanExpired'));
    }

    public function updateExpired(Request $request, $id){
        $listWebsite = ListWebsite::find($id);
        $tglSekarang = new DateTime(date('d-m-Y'));
        $tglSelesai = new DateTime($listWebsite->tgl_selesai);
        $expiredWeb = date_diff($tglSekarang, $tglSelesai);
        // dd($expiredWeb);
        $listWebsite->expired_at = $expiredWeb->days;
        // $listWebsite->expired_at->update();
        
        $listWebsite->update($request->all());

        return redirect()->route('dashboard', compact('listWebsite', 'tglSekarang'));
    }
}
