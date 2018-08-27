<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use DB;
class AnggotaController extends Controller
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
      $anggota = Anggota::all();
        return view('anggota.index',['anggota'=>$anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
      $anggota = Anggota::find($id);
      return view('anggota.show',['anggota'=>$anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $anggota = DB::table('logindata')->where('id',$id)->update([
          'konfirmasi'=>$request->status,
        ]);
        return redirect('anggota')->with('message','<alert class="alert alert success">Berhasil Mengubah Data</alert>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('logindata')->where('id',$id)->delete();
        return redirect('anggota')->with('message','<alert class="alert alert success">Data Berhasil di Hapus</alert>');
    }
}
