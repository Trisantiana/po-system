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
    	$listWebsite->tgl_aktif = $request->input('tgl_aktif');
    	$listWebsite->tgl_selesai = new DateTime($request->input('tgl_selesai'));
    	$listWebsite->periode = $request->input('periode');
    	$listWebsite->status = $request->input('status');
    	$listWebsite->id_jenis_website = $request->input('id_jenis_website');
    	// query untuk membuat selisih tgl otomatis
    	$tglSekarang = new DateTime(date('Y-m-d'));
    	// $tglSelesai = new DateTime($website->tgl_selesai) ;
    	$expiredWeb = date_diff($tglSekarang, $listWebsite->tgl_selesai); // query untuk menghitung selisih antara tgl sekarang dan tanggal selesai
    	// $expiredWeb->days = mengambil data jumlah selisih hari dari $expired web
    	$listWebsite->expired_at = $expiredWeb->days;
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
    	$listWebsite->update($request->all());

    	return redirect()->route('list-website.data', compact('listWebsite'))->with('success', 'Data Telah Diedit');;
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
    	$website = ListWebsite::find(1);
    	$listWebsite = new ListWebsite;
    	// dd($listWebsite);

    	$tglSekarang = new DateTime(date('Y-m-d'));
    	$tglSelesai = new DateTime($website->tgl_selesai) ;
    	$expiredWeb = date_diff($tglSekarang, $tglSelesai); // query untuk menghitung selisih antara tgl sekarang dan tanggal selesai
    	$listWebsite->expiredWeb = $expiredWeb;
    	$listWebsite->save();

    	// echo $expiredWeb->format('%m Bulan %d Hari');
    }
}
