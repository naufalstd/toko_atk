<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Auth;
use App\Pesanan;

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

        $notification = $this->notification();
        return view('home', compact('barangs','notification'));
    }

    public function notification()
    {
        if (Auth::user()->role == 'admin') {
            $data['notification'] = Pesanan::select('*')
                    ->join('users','users.id','pesanans.user_id')
                    ->where('pesanans.status','!=','selesai')
                    ->orderBy('pesanans.id', 'desc')
                    ->get();

            $data['jumlah_notification'] = count($data['notification']);
        }
        else if(Auth::user()->role == 'atasan') 
        {
            $data['notification'] = Pesanan::select('*')
                    ->join('users','users.id','pesanans.user_id')
                    ->join('transaksiatasans','transaksiatasans.id_bawahan','pesanans.user_id')
                    ->where('transaksiatasans.id_atasan',Auth::user()->id)
                    ->where('pesanans.status','Menunggu Konfirmasi Atasan')
                    ->orderBy('pesanans.id', 'desc')
                    ->get();

            $data['jumlah_notification'] = count($data['notification']);

            // dd($data['jumlah_notification']);
        }
        else{
            $data['notification'] = $data['notification'] = Pesanan::select('*')
                    ->join('users','users.id','pesanans.user_id')
                    ->where('pesanans.status','!=','selesai')
                    ->where('user_id',Auth::user()->id)
                    ->orderBy('pesanans.id', 'desc')
                    ->get();

            $data['jumlah_notification'] = count($data['notification']);
        }

        return $data;
    }
}
