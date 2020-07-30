<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = User::all();

        return view('pages.pelanggan.pelanggan-data', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = User::all();

        return view('pages.pelanggan.pelanggan-create', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProses(Request $request)
    {
        $pelanggan = New User;
        $pelanggan->name = $request->input('name');
        $pelanggan->email = $request->input('email');
        $pelanggan->password = $request->input('password');
        $pelanggan->bio = $request->input('bio');
        $pelanggan->id_level = '3';
        $pelanggan->save();

        return redirect()->route('pelanggan.data')->withInfo('Data Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = User::find($id);

        return view('pages.pelanggan.pelanggan-edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProses(Request $request, $id)
    {
        $pelanggan = User::find($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.data', compact('pelanggan'))->withInfo('Data Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pelanggan = User::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.data', compact('pelanggan'))->withDanger('Data Terhapus');
    }
}
