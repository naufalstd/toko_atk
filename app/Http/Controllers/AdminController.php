<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;
use App\Pesanan;
use Auth;
use App\PesananDetail;
use SweetAlert;
use App\User;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select('*','pesanans.id AS id_pesanan')
                ->join('pesanans','pesanans.user_id','users.id')
                ->get();
                // dd($user);
        return view('apps.admin.admin',compact('user')); 
    }

    public function detail($id)
    {
        // dd('aaa');
        $pesanan = Pesanan::where('id',$id)->first();
        $pesanan_detail = PesananDetail::select('*','pesanan_details.id AS id_pesanan_details')->where('pesanan_id',$id)
                        ->join('barangs','barangs.id','pesanan_details.barang_id')
                        ->get();            
        return view('apps.admin.detail',compact('pesanan_detail','pesanan')); 
    }

    public function update_pesanan(Request $request,$id)
    {   
        $pesanan = PesananDetail::where('id',$id)->update([
            'jumlah'=>$request->jumlah_pesan
        ]);
        alert()->success('Pesanan Terhapus', 'Berhasil');

        $pesanan = PesananDetail::where('id',$id)->first();
                // dd($pesanan);
        return redirect('/admin/detail/'.$pesanan->pesanan_id);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function konfirmasi_admin($id,$keterangan)
    {
        if ($keterangan == 'Konfirmasi') {
            $pesanan = Pesanan::where('id', $id)->update([
                'status' => 'proses'
            ]);
        }
        else{
            $pesanan = Pesanan::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        

        alert()->success('', 'Berhasil');
        return redirect('/admin');
    }

    
    
     
}
