<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;
Use Alert;


use App\HomeModel;
use App\Kategori;

use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET ALL PROVINCE
        $provincess = Province::orderby("name","asc")
                    ->select('id','name')->where('id',36)->get();
    //    
        $city= City::orderby("name","asc")
                    ->select('id','name')->where('id',3603)->get();

        
        $kategori = Kategori::all();
        return view('layout.bycategori.add',compact('provincess','city','kategori'));
    }

    public function editData(Rumah $rumah,Request $request)
    {
        //GET ALL PROVINCE
        // $rumah = Rumah::find($id_rumah);
        $provincess = Province::orderby("name","asc")
                    ->select('id','name')->where('id',36)->get();
    //    
        $city= City::orderby("name","asc")
                    ->select('id','name')->where('id',3603)->get();

        $dataAll = Rumah::with('kota','kecamatan','kelurahan','kategoris')->where('id_rumah',$request->id_rumah)->first();
        // dd($dataAll);
        $kategori = Kategori::all();
        return view('layout.bycategori.edit',compact('provincess','city','kategori','dataAll'));
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
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
    }


    public function prosestambahrumah(Request $request)
    {
        //  $this->validate($request, [
          
        //     'name'     => 'required',
        //     'email' => 'required'

        // ]);

        //upload image
        $rumah = new Rumah();
        $rumah->nama = $request->get('nama');
        $rumah->kategori_id = $request->get('kategori_id');
        $rumah->id = $request->get('id');
        $rumah->district_id =  $request->get('district_id');
        $rumah->villages_id = $request->get('villages_id');
        $rumah->alamat = $request->get('alamat');

        
      
        $rumah->save();


       
        if($rumah){
            //redirect dengan pesan sukses
             return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
           
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan!']);
           
        }
    }

    public function updateData(Request $request,$id_rumah)
    {
        //  $this->validate($request, [
          
        //     'id'     => 'required',
           

        // ]);

        //upload image
        $rumah = Rumah::find($id_rumah);
      
        if(is_null($rumah)){
            abort(404);
          }

        $rumah->id_rumah = $request->get('id_rumah');
        $rumah->nama = $request->get('nama');
        $rumah->kategori_id = $request->get('kategori_id');
        $rumah->id = $request->get('id');
        // $rumah->id = $request->get('id');

        // // CEK DATA KABUPATEN APAKAH KOSONG ATAU TIDAK 
        // if(is_null($rumah->id)){
        //     $rumah->id = $request->get('id_old');
        //   }
        // else{
        //     $rumah->id = $request->get('id');
        // }

        // // CEK DATA KECAMATAN APAKAH KOSONG ATAU TIDAK 
        // if(is_null($rumah->district_id)){
        //     $rumah->district_id = $request->get('district_old');
        //   }else{
        //     $rumah->district_id = $request->get('district_id');
        // }

        // // CEK DATA KELURAHAN APAKAH KOSONG ATAU TIDAK 
        // if(is_null($rumah->villages_id)){
        //     $rumah->villages_id = $request->get('villages_old');
        //   }else{
        //     $rumah->villages_id = $request->get('villages_id');
        // }

        

        
        $rumah->district_id =  $request->get('district_id');
        $rumah->villages_id = $request->get('villages_id');
        $rumah->alamat = $request->get('alamat');

        
      
        $rumah->save();


       
        if($rumah){
            //redirect dengan pesan sukses
             return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
           
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan!']);
           
        }
    }

    public function delete($id_rumah)
    {
        // echo $id; exit;
        $rumah = Rumah::where('id_rumah',$id_rumah)->delete();

        if($rumah){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Di Hapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Di Hapus!']);
        }
    }

    public function alert($AlertType){
        switch ($AlertType) {
        case 'success':
        Alert::success('this is success alert');
        return redirect('/');
        break;
        case 'info':
        Alert::info('this is info alert');
        return redirect('/');
        break;
        case 'warning':
        Alert::warning('this is warning alert');
        return redirect('/');
        break;
        case 'error':
        Alert::error('this is error alert');
        return redirect('/');
        break;
        case 'message':
        Alert::message('this is message alert');
        return redirect('/');
        break;
        
        default:
        return redirect('/');
        break;
        }
        }
}
