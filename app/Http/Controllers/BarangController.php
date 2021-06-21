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

class BarangController extends Controller
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
        $barangs=Barang::all();
        return view('admin.data',compact('barangs'));
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
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'gambar' => $request->nama_barang.'.'.$file->extension()
        ]);

        
        $tujuan_upload = 'uploads';
 
                // upload file
        $file->move($tujuan_upload,$request->nama_barang.'.'.$file->extension());
        alert()->success(' Berhasil', 'Success');
        return redirect('admin/data');
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
        $barangs=Barang::where('id',$id)->first();
        return view('admin.edit_data',compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file = $request->file('file');
        // dd($file);
        if(empty($file)){
            Barang::where('id',$request->id_barang)->update([
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
                'id_kategori' => $request->id_kategori,
            ]);
        }else{
             Barang::where('id',$request->id_barang)->update([
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
                'id_kategori' => $request->id_kategori,
                'gambar' => $request->nama_barang.'.'.$file->extension()
            ]);

            
            $tujuan_upload = 'uploads';
     
                    // upload file
            $file->move($tujuan_upload,$request->nama_barang.'.'.$file->extension());
        }
        alert()->success('Update Berhasil', 'Success');
        return redirect('admin/data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Barang::where('id',$id)->delete();
        alert()->success('Hapus Berhasil', 'Success');
        return redirect('admin/data');
    }
}
