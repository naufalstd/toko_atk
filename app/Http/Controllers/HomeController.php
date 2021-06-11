<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Auth;

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
        // role untuk menentukan admin atau user
        if(Auth::user()->role != 'user'){
            return redirect('/admin');
        }

        $barangs = Barang::all();
        return view('home', compact('barangs'));
    }
}
