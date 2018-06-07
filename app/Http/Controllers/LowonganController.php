<?php

namespace App\Http\Controllers;

use App\Lowongan;
use App\Perusahaan;
use Illuminate\Http\Request;
use Session;

class LowonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $q = Lowongan::with('Perusahaan')->get();
        return view('lowongan.index',compact('q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $p = Perusahaan::all();
        return view('lowongan.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|max:255',
            'pers_id' => 'required'
        ]);
        $q = new Lowongan;
        $q->nama_low = $request->nama_low;
        $q->tgl_mulai = $request->tgl_mulai;
        $q->lokasi = $request->lokasi;
        $q->gaji = $request->gaji;
        $q->deskripsi_iklan = $request->deskripsi_iklan;
        $q->pers_id = $request->pers_id;
        $q->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$q->deskripsi</b>"
        ]);
        return redirect()->route('lowongan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $q= Lowongan::findOrFail($id);
        return view('lowongan.show',compact('q'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $q = Lowongan::findOrFail($id);
        $p = Perusahaan::all();
        $selectedp = Lowongan::findOrFail($id)->low_id;
        return view('lowongan.edit',compact('q','p','selectedp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$this->validate($request,[
            'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|max:255',
            'pers_id' => 'required'
        ]);
        $q = Lowongan::findOrFail($id);
        $q->nama_low = $request->nama_low;
        $q->tgl_mulai = $request->tgl_mulai;
        $q->lokasi = $request->lokasi;
        $q->gaji = $request->gaji;
        $q->deskripsi_iklan = $request->deskripsi_iklan;
        $q->pers_id = $request->pers_id;
        $q->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$q->nama_low</b>"
        ]);
        return redirect()->route('lowongan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $q = Lowongan::findOrFail($id);
        $q->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lowongan.index');
    }
}
