<?php

namespace App\Http\Controllers;

use App\Perusahaan;
use App\User;
use File;
use Illuminate\Http\Request;
use Session;
class PerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $p = Perusahaan::with('User')->get();
        return view('perusahaan.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $o = User::all();
        return view('perusahaan.create',compact('o'));
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
            'nama' => 'required|',
            'logo' => 'required|',
            'deskripsi' => 'required|',
            'kategori' => 'required|',
            'subkategori' => 'required|',
            'judul' => 'required|',
            'gaji' => 'required|',
            'tgl_mulai' => 'required|',
            'email' => 'required|unique:perusahaans',
             'telepon' => 'required|',
            'user_id' => 'required|'
        ]);
        $p = new Perusahaan;
        $p->nama = $request->nama;
        $p->logo = $request->logo;
        $p->deskripsi = $request->deskripsi;
        $p->kategori = $request->kategori;
        $p->subkategori = $request->subkategori;
        $p->judul = $request->judul;
        $p->gaji = $request->gaji;
        $p->tgl_mulai = $request->tgl_mulai;
        $p->email = $request->email;
        $p->telepon = $request->telepon;
        $p->user_id = $request->user_id;

        //upload foto
        if($request->hasfile('logo')){
            $file =$request ->file('logo');
            $destinationPath = public_path().'/assets/admin/images/loker/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucsess =$file -> move($destinationPath,$filename);
            $p->logo = $filename;
            
        }
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Pesanan
        //  yang ada di model Perusahaan
        Session::flash("flash_notification", [

        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->logo</b>"
        ]);
        $p->save();
        return redirect()->route('perusahaan.index');
            
        }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $p = Perusahaan::findOrFail($id);
        return view('perusahaan.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Perusahaan::findOrFail($id);
        $o= User::all();
        $selectedo = Perusahaan::findOrFail($id)->user_id;
     
        return view('perusahaan.edit',compact('p','o','selectedo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'logo' => 'required|',
            'deskripsi' => 'required|',
            'kategori' => 'required|',
            'subkategori' => 'required|',
            'judul' => 'required|',
            'gaji' => 'required|',
            'tgl_mulai' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'user_id' => 'required|'
        ]);
        $p = Perusahaan::findOrFail($id);
        $p->nama = $request->nama;
        $p->logo = $request->logo;
        $p->deskripsi = $request->deskripsi;
        $p->kategori = $request->kategori;
        $p->subkategori = $request->subkategori;
        $p->judul = $request->judul;
        $p->gaji = $request->gaji;
        $p->tgl_mulai = $request->tgl_mulai;
        $p->email = $request->email;
        $p->telepon = $request->telepon;
        $p->user_id = $request->user_id;
        //edit upload foto
         if($request->hasfile('logo')){
            $file =$request ->file('logo');
            $destinationPath = public_path().'/assets/admin/images/loker/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucsess =$file -> move($destinationPath,$filename);
            //hapus foto lama jika ada
            if($p->logo) {
                $old_foto =$p->logo;
                $filepath = public_path() . DIRECTORY_SEPARATOR .'/assets/admin/images/loker/' . DIRECTORY_SEPARATOR  . $p->logo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    //file sudah di hapus/tidak ada
                }
     }       
                $p->logo = $filename;
            }
                $p->save();
        return redirect()->route('perusahaan.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perusahaan $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Perusahaan::findOrFail($id);
        $p->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('perusahaan.index');
    }
}


