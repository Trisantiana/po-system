<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\ListWebsite;
use DateTime;
use Carbon\Carbon;

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
        // $webYangAkanExpired = ListWebsite::where('expired_at', '>', 0)->latest()->get();
        $month = Carbon::now();
        $webYangAkanExpired = ListWebsite::whereMonth('tgl_selesai', $month)->orderBy('tgl_selesai', 'asc')->get();
        // dd($webYangAkanExpired);

        // $month = Carbon::now();
        $jumlahWebExpiredBulanIni = ListWebsite::whereMonth('tgl_selesai', $month)->count('id');
        // dd($jumlahWebExpiredBulanIni);

        // $now = Carbon::now()->format('m');
        // $expired = ListWebsite::select(DB::raw(MONTH('tgl_selesai')), $now);
        // dd($expired);

        return view('dashboard', compact('listWebsite', 'listWebsiteSewa', 'webExpired', 'user', 'tglSekarang', 'webYangAkanExpired', 'jumlahWebExpiredBulanIni'));
    }

    public function updateExpired(Request $request, $id){
        $listWebsite = ListWebsite::find($id);
        // ** update expired_at dengan sistem selisih hari
        // $tglSekarang = new DateTime(date('d-m-Y'));
        // $tglSelesai = new DateTime($listWebsite->tgl_selesai);
        // $expiredWeb = date_diff($tglSekarang, $tglSelesai);
        // $listWebsite->expired_at = $expiredWeb->days;
        // $listWebsite->expired_at->update();

        $tglSekarang = strtotime(now());
        // $jatuhTempo =  strtotime($listWebsite->tgl_selesai);

        // $selisihHari = $jatuhTempo - $tglSekarang;
        // $result = ($selisihHari/24/60/60);
        // $listWebsite->expired_at = $result;

        // $listWebsite->update($request->all());

        $storedProcedure = DB::select("call web_expired(".$listWebsite->id.")");

        return redirect()->route('dashboard', compact('listWebsite', 'tglSekarang'));
    }
}
