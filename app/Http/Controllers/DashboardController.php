<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\PesananDetail;

class DashboardController extends Controller
{
    
	public function dashboard(){

		// menjumlahnya semua yang di pesan user untuk di tampilkan di dashboard
		$jumlahproduk = PesananDetail::sum('jumlah');
		$totalpengeluaran	= Pesanan::sum('biaya');
		$jumlahpesanan = Pesanan::all()->count();

		// compact untuk mengirim variabel ke view 
		return view('dashboard',compact('jumlahproduk','totalpengeluaran','jumlahpesanan'));
	}


}
