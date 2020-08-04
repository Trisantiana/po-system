<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ListWebsite;
use App\JenisWebsite;
use App\User;
use Carbon\Carbon;
use DateTime;


class WebsiteController extends Controller
{
    public function index() {
    	$listWebsite = ListWebsite::latest()->paginate(100);
    	$jenisWebsite = JenisWebsite::all();
    	$user = User::all(); 

    	return view('pages.list-website.website-data', compact('listWebsite','user','jenisWebsite'));
    }

    public function detail($id){
        $website = ListWebsite::find($id);
        $user = User::all();
        $jenisWebsite = JenisWebsite::all();
        // $tglSekarang = new DateTime(date('Y-m-d'));
        // $tglSelesai = new DateTime($website->tgl_selesai);
        // $tglExpired = date_diff($tglSelesai, $tglSekarang);
        // $listExpired = array($tglExpired);
        // $result = $listExpired['0']->invert;
        // dd($result);
        $tglSekarang = strtotime(now());
        $jatuhTempo =  strtotime($website->tgl_selesai);

        $selisihHari = $jatuhTempo - $tglSekarang;
        $result = substr(($selisihHari/24/60/60), 0,2);

        return view('pages.list-website.website-detail', compact('website', 'user', 'jenisWebsite', 'selisihHari', 'result', 'tglSekarang'));
    }

    // function create
    public function create(){
    	$listWebsite = ListWebsite::all();
        $jenisWebsite = JenisWebsite::all();
        $users = User::all();
        return view('pages.list-website.website-create', compact('listWebsite','users', 'jenisWebsite'));
    }

    // function simpan data saat create
    public function addProses(Request $request) {
    	$listWebsite = new ListWebsite;
    	$listWebsite->id_pelanggan = $request->input('id_pelanggan');
    	$listWebsite->nama_website = $request->input('nama_website');
    	$listWebsite->url_website = $request->input('url_website');
    	$listWebsite->merk = $request->input('merk');
    	$listWebsite->wilayah = $request->input('wilayah');
    	$listWebsite->tgl_aktif = new DateTime( $request->input('tgl_aktif'));
    	$listWebsite->tgl_selesai = $request->input('tgl_selesai');
    	$listWebsite->periode = $request->input('periode');
    	$listWebsite->status = $request->input('status');
    	$listWebsite->id_jenis_website = $request->input('id_jenis_website');

        // **sistem sewa dengan tgl selesai dikurangi 20 hari
        // $tglSekarang = new DateTime(date('Y-m-d'));
        // $dueDate = new DateTime($listWebsite->tgl_selesai);
        // $endDueDate = $dueDate->modify("-20 days"); // tgl selesai-20 hari untuk jatuh tempo penagihan
        // $listWebsite->expired_at = $endDueDate->format('Y-m-d');
        // dd($listWebsite->expired_at);
        // **sistew sewa dengan hitngan selisih hari
        // $tglSelesai = new DateTime($website->tgl_selesai) ;
        // $expiredWeb = date_diff($listWebsite->tgl_selesai, $tglSekarang); 
        // query untuk menghitung selisih antara tgl sekarang dan tanggal selesai
    	// $expiredWeb->days = mengambil data jumlah selisih hari dari $expired web
    	// $listWebsite->expired_at = json_encode($expiredWeb);
        // dd($listWebsite->expired_at);

        $tglSekarang = strtotime(now());
        $jatuhTempo =  strtotime($listWebsite->tgl_selesai);

        $selisihHari = $jatuhTempo - $tglSekarang;
        $result = ($selisihHari/24/60/60);
        $listWebsite->expired_at = $result;
        
        // dd($listWebsite->expired_at);

        $listWebsite->save();

        return redirect('list-website/data')->with('success', 'Data Tersimpan');
    }

    //function edit

    public function edit($id){
    	$listWebsite = ListWebsite::find($id);
    	$users = User::all();
    	$jenisWebsite = JenisWebsite::all();

    	return view('pages.list-website.website-edit', compact('listWebsite', 'users', 'jenisWebsite'));
    }

    // function proses edit
    public function editProses(Request $request, $id){
    	$listWebsite = ListWebsite::find($id);
        //** edit dengan sistem selisih hari
        // $listWebsite->tgl_aktif = new DateTime($request->input('tgl_aktif'));
        // $listWebsite->tgl_selesai = new DateTime($request->input('tgl_selesai'));
        // $expiredWeb = date_diff($listWebsite->tgl_aktif, $listWebsite->tgl_selesai);
        // $listWebsite->expired_at = $expiredWeb->days;
        // edit dengan sistem pengurangan hari
        $tglSekarang = strtotime(now());
        $jatuhTempo =  strtotime($listWebsite->tgl_selesai);

        $selisihHari = $jatuhTempo - $tglSekarang;
        $result = ($selisihHari/24/60/60);
        $listWebsite->expired_at = $result;

        $listWebsite->update($request->all());

        return redirect()->route('list-website.data', compact('listWebsite'))->with('success', 'Data Telah Diedit');
    }

    //function hapus data
    public function delete($id){
    	$listWebsite = ListWebsite::find($id);
    	$listWebsite->delete();

    	return redirect()->route('list-website.data', compact('listWebsite'))->with('success', 'Data Terhapus');
    }

    // function untuk menghitung 20 hari sebelum tgl selesai sewa web
    public function expiredWebsite(){
    	// $listWebsite = ListWebsite::find($id);
    	$website = ListWebsite::find(2);
    	$listWebsite = new ListWebsite;
    	$tglSekarang = strtotime(date('d-m-Y'));
    	$tglExpired = strtotime($website->tgl_selesai);
    	
        $webExpired = date('d-m-Y', $tglExpired) - date('d-m-Y', $tglSekarang);
    	// $expiredWeb = date_diff($tglSekarang, $tglSelesai); // query untuk menghitung selisih antara tgl sekarang dan tanggal selesai
    	// dd($webExpired);
        $listWebsite->expiredWeb = $webExpired;
        dd($listWebsite->expiredWeb);
    	// $listWebsite->save();
    	// echo $expiredWeb->format('%m Bulan %d Hari');
    }

    // public function updateExpired(Request $request, $id){
    //     $listWebsite = ListWebsite::find($id);
    //     $tglSekarang = new DateTime(date('d-m-Y'));
    //     $tglSelesai = new DateTime($listWebsite->tgl_selesai);
    //     $expiredWeb = date_diff($tglSekarang, $tglSelesai);
    //     // dd($expiredWeb);
    //     $listWebsite->expired_at = $expiredWeb->days;
    //     // $listWebsite->expired_at->update();
        
    //     $listWebsite->update($request->all());

    //     return redirect()->route('dashboard');
    // }

    public function updateExpiredWeb(ListWebsite $listWebsite){
        // $listWebsite->call(function () {
        //     DB::table('list_website')->whereRaw('tgl_selesai > now()')->update(['expired_at' => '(tgl_selesai - now())']);
        // })->daily();
        $tglSekarang = strtotime(now());
        $jatuhTempo =  strtotime($listWebsite->tgl_selesai);

        $selisihHari = $jatuhTempo - $tglSekarang;
        $result = substr(($selisihHari/24/60/60), 3, 15);
        $listWebsite = ListWebsite::whereRaw('tgl_selesai > now()')->update(['expired_at' => $result])->daily();

        // dd($listWebsite);

        return view('home', compact('listWebsite'));
    }


    public function jatuhTempo($id){
        $listWebsite = ListWebsite::find($id);
        $tglSekarang = strtotime(now());
        $jatuhTempo =  strtotime($website->tgl_selesai);

        $beda = $jatuhTempo - $tglSekarang;
        $bedahari = substr(($beda/24/60/60), 0,2);
        substr($bedahari, 0, 2);

        return view('dashboard', compact(varname));

    }

}



