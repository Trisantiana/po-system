<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\ListWebsite;

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
        $listWebsite = DB::table('list_website')
                            ->count('id');
        $listWebsiteSewa = DB::table('list_website')
                                ->where('id_jenis_website', '=', 1)
                                ->count('id');
        // $webExpired = DB::table('list_website')->where('expired_at', '<=', 31)->latest()->get();
        $webExpired = ListWebsite::where('expired_at', '<=', 31)->latest()->get();
        $user = User::all();

        return view('dashboard', compact('listWebsite', 'listWebsiteSewa', 'webExpired', 'user'));
    }
}
