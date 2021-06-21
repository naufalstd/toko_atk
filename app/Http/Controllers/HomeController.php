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
        // role untuk menentukan atasan ngelink ke keranjang
        if(Auth::user()->role == 'atasan'){
            return redirect('/keranjang');
        }elseif (Auth::user()->role == 'admin') {
            return redirect('/categori');
        }

        $barangs = Barang::all();
        return view('home', compact('barangs'));
    }
}
