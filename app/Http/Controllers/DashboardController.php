<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\PesananDetail;
use DB;
use Auth;
use App\Transaksiatasan;


class DashboardController extends Controller
{
    
	public function dashboard(){


		if(Auth::user()->role == 'admin') {

					// menjumlahnya semua yang di pesan user untuk di tampilkan di dashboard
		$jumlahproduk = PesananDetail::sum('jumlah');
		$totalpengeluaran	= Pesanan::sum('biaya');
		$jumlahpesanan = Pesanan::all()->count();

		// u=user , pd=pesanandetail, p=pesanan ambil dari database 
		$user = DB::select("SELECT u.name, SUM(p.biaya) AS pengeluaran, pd.total AS produkdipesan FROM users u, pesanans p, ( SELECT users.id, SUM(pesanan_details.jumlah) AS total FROM pesanan_details, pesanans, users WHERE users.id = pesanans.user_id AND pesanans.id = pesanan_details.pesanan_id GROUP BY users.id ) AS pd WHERE u.id = p.user_id AND u.id = pd.id GROUP BY u.id");

		$barang = DB::select("SELECT b.nama_barang, SUM(pd.jumlah) AS jumlah FROM pesanan_details pd, barangs b WHERE b.id = pd.barang_id GROUP BY pd.barang_id");

		
		// compact untuk mengirim variabel ke view 
		return view('dashboard',compact('jumlahproduk','totalpengeluaran','jumlahpesanan','user','barang'));
		

	}else if(Auth::user()->role == 'user'){

		
		$jumlahproduk = PesananDetail::join('pesanans','pesanans.id','pesanan_details.pesanan_id')
						->where('user_id',Auth::user()->id)
						->sum('jumlah');
		$totalpengeluaran	= Pesanan::where('user_id',Auth::user()->id)->sum('biaya');
		$jumlahpesanan = Pesanan::where('user_id',Auth::user()->id)->count();

		// u=user , pd=pesanandetail, p=pesanan ambil dari database 
		$user = DB::select("SELECT u.name, SUM(p.biaya) AS pengeluaran, pd.total AS produkdipesan FROM users u, pesanans p, ( SELECT users.id, SUM(pesanan_details.jumlah) AS total FROM pesanan_details, pesanans, users WHERE users.id = pesanans.user_id AND pesanans.id = pesanan_details.pesanan_id GROUP BY users.id ) AS pd WHERE u.id = p.user_id AND u.id = pd.id GROUP BY u.id");

		$barang = DB::select("SELECT b.nama_barang, SUM(pd.jumlah) AS jumlah FROM pesanan_details pd, barangs b,pesanans p WHERE b.id = pd.barang_id AND p.id = pd.pesanan_id and p.user_id = ".Auth::user()->id." GROUP BY pd.barang_id");
		
		// compact untuk mengirim variabel ke view 
		return view('dashboard',compact('jumlahproduk','totalpengeluaran','jumlahpesanan','user','barang'));

	}else{

		$jumlahproduk = PesananDetail::join('pesanans','pesanans.id','pesanan_details.pesanan_id')
						->join('transaksiatasans','transaksiatasans.id_bawahan','pesanans.user_id')
						->where('transaksiatasans.id_atasan',Auth::user()->id)
						->sum('jumlah');
		$totalpengeluaran	= Transaksiatasan::select('users.dana')->where('id_atasan',Auth::user()->id)->join('users','users.id','transaksiatasans.id_bawahan')->first();
		$totalpengeluaran = strval($totalpengeluaran->dana);
		
		$jumlahpesanan = Pesanan::join('transaksiatasans','transaksiatasans.id_bawahan','pesanans.user_id')
						->where('id_atasan',Auth::user()->id)->count();

		// u=user , pd=pesanandetail, p=pesanan ambil dari database 
		$user = DB::select("SELECT u.name, SUM(p.biaya) AS pengeluaran, pd.total AS produkdipesan FROM users u, pesanans p, ( SELECT users.id, SUM(pesanan_details.jumlah) AS total FROM pesanan_details, pesanans, users WHERE users.id = pesanans.user_id AND pesanans.id = pesanan_details.pesanan_id GROUP BY users.id ) AS pd WHERE u.id = p.user_id AND u.id = pd.id GROUP BY u.id");

		$barang = DB::select("SELECT b.nama_barang, SUM(pd.jumlah) AS jumlah FROM pesanan_details pd, barangs b,pesanans p, transaksiatasans t WHERE b.id = pd.barang_id AND p.id = pd.pesanan_id and t.id_bawahan = p.user_id and t.id_atasan = ".Auth::user()->id." GROUP BY pd.barang_id");
		
		// compact untuk mengirim variabel ke view 
		return view('dashboard',compact('jumlahproduk','totalpengeluaran','jumlahpesanan','user','barang'));

	}


	}


}
