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
use Illuminate\Support\Facades\Hash;
use App\Transaksiatasan;


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
                ->orderBy('pesanans.id','DESC') //mendapatkan pesanan terbaru
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
        elseif ($keterangan == 'proses') {
            $pesanan = Pesanan::where('id', $id)->update([
                'status' => 'dikirim'
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

    public function biaya(Request $request)
    {   
        // mencari pesanan dengan request id pesanan
        $pesanan =  Pesanan::where('id', $request->id_pesanan)->first();

        // mencari user yang memesan 
        $user = User::where('id',$pesanan->user_id)->first();

        // menghitung dana tersisa dari user
        $danatersisa = $user->dana - $request->biaya ; 

        // mengupdate dana tersisa di user
        $updatedana = User::where('id',$pesanan->user_id)->update([
            'dana' => $danatersisa
        ]);

        // mengupdate status pesanan dan menuliskan total biaya pada pesanan
        $pesanan = Pesanan::where('id', $request->id_pesanan)->update([
            'status' => 'dikirim',
            'biaya' => $request->biaya
        ]);
     

        alert()->success('', 'Berhasil');
        return redirect('/admin');
        
    }
    

    public function dana()
    {

        $user = User::where('role','user')->get();
     

        alert()->success('', 'Berhasil');
        return view('apps.admin.dana',compact('user'));

    }
     

    public function update_dana(Request $request)
    {

        $user = User::where('id', $request->id)->update([
            'dana' => $request->dana
        ]);
     

        alert()->success('', 'Berhasil');
        return redirect('/admin/dana');
        
    }

    public function user()
    {

        $user = User::all();
        // dd($user);
        return view('apps.admin.daftar',compact('user'));
    }

    public function tambah_user(Request $request)
    {
       
        $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,  
                'password'=> Hash::make($request->password),
                'role' => $request->role,
            ]);
        alert()->success('Berhasil Di Tambah', 'Berhasil');
        return redirect('/daftar');   
    }

    public function hapus_user($id)
    {

        $user = User::where('id',$id)->delete();
        

        alert()->success('User Terhapus', 'Berhasil');
        return redirect('/daftar');

    }

    public function show_edituser($id)
    {

        $user = User::where('id',$id)->first();
        $userall = User::where('role','!=','admin')->get();
        $terhubung = Transaksiatasan::where('id_atasan',$user->id)->orWhere('id_bawahan',$user->id)->first();
        return view('apps.admin.edit_user',compact('user','userall','terhubung'));

    }

    public function edit_user(Request $request)
    {

        $user = User::where('id',$request->id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'role' => $request->role,
        ]);
        $terhubung = Transaksiatasan::where('id_atasan',$request->id)->orWhere('id_bawahan',$request->id)->first();
        if(empty($terhubung)){
            if($request->role == 'atasan'){
                Transaksiatasan::create([
                    'id_atasan' =>Auth::user()->id,
                    'id_bawahan' =>$request->terhubung,
                ]);
            }
            else{
                Transaksiatasan::create([
                    'id_atasan' =>$request->terhubung,
                    'id_bawahan' =>Auth::user()->id,
                ]);
            }
        }
        else{
            if($request->role == 'atasan'){
                Transaksiatasan::where('id',$terhubung->id)->update([
                    'id_atasan' =>Auth::user()->id,
                    'id_bawahan' =>$request->terhubung,
                ]);
            }
            else{
                Transaksiatasan::where('id',$terhubung->id)->update([
                    'id_atasan' =>$request->terhubung,
                    'id_bawahan' =>Auth::user()->id,
                ]);
            }
        }
        alert()->success('Berhasil Di Edit', 'Berhasil');
        return redirect('/daftar');
    }

    public function password($id)
    {

        $user = User::where('id',$id)->update([  
            'password'=> Hash::make('kimiafarma'),
        ]);
        alert()->success('Berhasil Di Edit', 'Berhasil');
        return redirect('/daftar');
    }


    // menampilkan ganti password untuk user
    public function gantipassword()
    {

        return view('apps.user.password');
    }
    // ganti password untuk user
    public function ubahpassword(Request $request)
    {

        $user = User::where('id',Auth::user()->id)->update([  
            'password'=> Hash::make($request->password),
        ]);
        return view('apps.user.password');
    }
}
