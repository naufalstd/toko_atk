<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;
use App\Pesanan;
use Auth;
use App\PesananDetail;
use SweetAlert;


class PesanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($id)
	{
		 $barang = Barang::where('id', $id)->first();
		 // dd($barang);
		 return view('pesan.index', compact('barang'));
	}

	public function pesan(Request $request, $id)
	{

		$barang = Barang::where('id', $id)->first();
		$tanggal = Carbon::now();
		// validasi apakah melebihi stock
	
		// cek validasi
		$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
		


		// simpan ke database pesanan
		if (empty($cek_pesanan)) 
		{
			Pesanan::create([
				'user_id'=> Auth::user()->id,
				'tanggal'=> $tanggal,
				'status'=> 0,	
				'jumlah_harga'=> 0,
			]);
		}

		// dd(Auth::user()->id);

		// simpan ke database pesanan detail
		$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)
						->where('status', 0)
						->first();

		// cek pesanan detail
		$cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)
							->where('pesanan_id', $pesanan_baru->id)
							->first();

		if (empty($cek_pesanan_detail)) 
		{
			PesananDetail::create([
				'barang_id'=> $barang->id,
				'pesanan_id'=> $pesanan_baru->id,
				'jumlah'=> $request->jumlah_pesan,	
				'jumlah_harga'=> $barang->harga*$request->jumlah_pesan,
			]);
		} 
		else 
		{
			$harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
			PesananDetail::where('barang_id', $barang->id)
							->where('pesanan_id', $pesanan_baru->id)
							->update([
								'jumlah'=> $cek_pesanan_detail->jumlah + $request->jumlah_pesan,
								'jumlah_harga'=> $cek_pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru,
							]);
		}
		
		$cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)
							->where('pesanan_id', $pesanan_baru->id)
							->first();

		Pesanan::where('user_id', Auth::user()->id)
				->where('status', 0)
				->update([
					'jumlah_harga' => $cek_pesanan_detail->jumlah_harga + $barang->harga*$request->jumlah_pesan,
		]);


		$barang = Barang::where('id', $id)->first();
		//syntaks update
		

		alert()->success('Pembelian Berhasil', 'Success');
		return redirect('home');
	}

	public function keranjang()
	{
		$pesanan = PesananDetail::select('*')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->get();
		// dd($pesanan);

		return view('pesan.keranjang',compact('pesanan'));
	}

	public function edit_keranjang($id)
	{
		$pesanan = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->where('pesanan_details.barang_id',$id)
					->first();
				// dd($pesanan);
		return view('pesan.edit_keranjang',compact('pesanan'));		
	}

	public function update_keranjang(Request $request,$id)
	{	
		
		$pesanan = PesananDetail::where('id',$request->id_detail_keranjang)->update([
			'jumlah'=>$request->jumlah_pesan
		]);
		alert()->success('Pesanan Terhapus', 'Berhasil');

				// dd($pesanan);
		return redirect('/keranjang');		
	}

	public function hapus($id)
	{
	
		$data = PesananDetail::select('pesanan_details.*')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->where('pesanan_details.barang_id',$id)
					->first();
				
		$pesanan = PesananDetail::where('id',$data->id)->delete();
		

		alert()->success('Pesanan Terhapus', 'Berhasil');
		return redirect('/keranjang');
		// $res = PesananDetail::where('pesanan_details.barang_id','$id')->delete();
				 // return redirect('pesanan_details.barang_id');
	}
}
