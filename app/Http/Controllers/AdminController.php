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
        return view('admin.index',compact('user')); 
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id',$id)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id',$id)
                        ->join('barangs','barangs.id','pesanan_details.barang_id')
                        ->get();
        return view('admin.detail',compact('pesanan_detail','pesanan')); 
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
                'status' => 'selesai'
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
