<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;
use App\Pesanan;
use Auth;
use App\PesananDetail;
use SweetAlert;
use App\Categori;
use App\Transaksiatasan;


class PesanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($id)
	{
		 $barang = Barang::where('id', $id)->first();

		return view('apps.barang.detail', compact('barang'));
	}

//nyoba

	public function pesan(Request $request, $id)
	{
		$barang = Barang::where('id', $id)->first();
		$tanggal = Carbon::now();
		// validasi apakah melebihi stock
	
		// cek validasi
		$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();
		
		// simpan ke database pesanan
		if (empty($cek_pesanan)) 
		{
			Pesanan::create([
				'user_id'=> Auth::user()->id,
				'tanggal'=> $tanggal,
				'status'=> 'keranjang',	
				
			]);
		}

		$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'keranjang')->first();

		// dd(Auth::user()->id);

		// simpan ke database pesanan detail
		$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)
						->where('status', 'keranjang')
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
				'noted'=> $request->noted,
			]);
		}
		else{
			PesananDetail::where('id', $cek_pesanan_detail->id)->update([
				'jumlah'=> $request->jumlah_pesan + $cek_pesanan_detail->jumlah,	
				'noted'=> $request->noted,
			]);
		} 
		
		
		$cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)
							->where('pesanan_id', $pesanan_baru->id)
							->first();

		

		$barang = Barang::where('id', $id)->first();
		//syntaks update
		

		alert()->success('Pembelian Berhasil', 'Success');
		return redirect('barang');
	}

	public function keranjang()
	{
		
		if (Auth::user()->role == 'atasan') 
		{
			$pesanan = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details','pesanan_details.updated_at AS tanggal_diupdate', 'pesanan_details.created_at AS tanggal_dibuat')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->join('transaksiatasans','transaksiatasans.id_bawahan','pesanans.user_id')
					->where('pesanans.status','Menunggu Konfirmasi Atasan')
					->where('transaksiatasans.id_atasan',Auth::user()->id)
					->orderBy('pesanans.id', 'desc')
					->get();

			$pesanan_belum_konfirmasi = count($pesanan);
		}
		else{
			$pesanan = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details','pesanan_details.updated_at AS tanggal_diupdate', 'pesanan_details.created_at AS tanggal_dibuat')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->orderBy('pesanans.id', 'desc')
					->get();

			$pesanan_belum_konfirmasi = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->where('pesanans.status','keranjang')
					->get()->count();
		}
		

		return view('apps.barang.keranjang',compact('pesanan','pesanan_belum_konfirmasi'));
	}

	public function edit_keranjang($id)
	{
		$pesanan = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details')
					->join('pesanans','pesanans.id','pesanan_details.pesanan_id')
					->join('barangs','barangs.id','pesanan_details.barang_id')
					->where('user_id',Auth::user()->id)
					->where('pesanan_details.barang_id',$id)
					->where('pesanans.status','keranjang')
					->first();
				// dd($pesanan);

		return view('pesan.edit_keranjang',compact('pesanan'));		
	}

	public function update_keranjang(Request $request,$id)
	{	
		$pesanan = PesananDetail::where('id',$id)->update([
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

	public function konfirmasi_user()
	{
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'keranjang')->update([
			'status' => 'Menunggu Konfirmasi Atasan'
		]);
		alert()->success('', 'Berhasil');
		return redirect('/keranjang');
	}

	public function barang()
	{
		$categori=Categori::all();
		// dd($categori);
		$barangs=Barang::all();
		return view('apps.barang.index',compact("barangs","categori"));
	}

	public function categori_getid($id)
	{
		$categori=Categori::all();
		// dd($categori);
		$barangs=Barang::where('id_kategori',$id)->get();
		return view('apps.barang.index',compact("barangs","categori"));
	}

	public function konfirmasi_atasan()
	{	
		//mendapatkan id bawahan
		$atasan = Transaksiatasan::where('id_atasan',Auth::user()->id)->first();

		//merubah status pesanan dari bawahan yang diperoleh dari $atasan diatas
		$pesanan = Pesanan::where('user_id', $atasan->id_bawahan)
				->where('status', 'Menunggu Konfirmasi Atasan')->update([
					'status' => 'Terkonfirmasi Atasan'
				]);
				
		alert()->success('', 'Berhasil');
		return redirect('/keranjang');
	}

	public function pesanan()
	{
		// get ke database pesanan
		$pesanan = Pesanan::orderBy('id', 'DESC')->get();
		// dd($pesanan);
		return view('apps.barang.index',compact("pesanan"));
	}

	public function konfirmasi_selesai($id)
    {
       dd($id);
        $pesanan = Pesanan::where('id', $id)->update([
            'status' => 'selesai'
        ]);
     

        alert()->success('', 'Berhasil');
        return redirect('/keranjang');
    }

}
