<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JenisWebsite;

class JenisWebsiteController extends Controller
{
	public function index() {
		$jenisWebsite = JenisWebsite::all();

		return view('pages.jenis-website.jenis-website-data', compact('jenisWebsite'));
	}
	public function create() {
		$jenisWebsite = JenisWebsite::all();

		return view('pages.jenis-website.jenis-website-create', compact('jenisWebsite'));
	}

	public function addProses(Request $request, $id){
		$jenisWebsite = JenisWebsite::find($id);	
		$jenisWebsite->jenis_website = $request->input('jenis_website');
		$jenisWebsite->save();

		return redirect()->route('jenis-website.data', compact('jenisWebsite'));
	}

	public function edit(Request $request, $id){
		$jenisWebsite = JenisWebsite::find($id);	

		return view('pages.jenis-website.jenis-website-edit', compact('jenisWebsite'));
	}

	public function editProses(Request $request, $id){
		$jenisWebsite = JenisWebsite::find($id);	
		$jenisWebsite->update($request->all());

		return redirect()->route('jenis-website.data', compact('jenisWebsite'));
	}

	public function delete($id){
		$jenisWebsite::find($id);
		$jenisWebsite->delete();

		return redirect()->route('jenis-website.data');
	}


}
