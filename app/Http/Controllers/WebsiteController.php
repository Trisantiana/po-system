<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ListWebsite;
use App\JenisWebsite;
use App\User;

class WebsiteController extends Controller
{
    public function index() {
    	$listWebsite = ListWebsite::latest()->paginate(100);
    	$jenisWebsite = JenisWebsite::all();
    	$users = User::all(); 

    	return view('pages.list-website.website-data', compact('listWebsite','users','jenisWebsite'));

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
    	$listWebsite->tgl_selesai = $request->input('tgl_selesai');
    	$listWebsite->periode = $request->input('periode');
    	$listWebsite->status = $request->input('status');
    	$listWebsite->id_jenis_website = $request->input('id_jenis_website');
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

    	return redirect('list-website/data')->with('success', 'Data Telah Diedit');;
    }
}
