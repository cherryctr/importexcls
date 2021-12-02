<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\Datatables\Datatables;



use Illuminate\Http\Request;
use App\HomeModel;
use App\Kategori;
use App\Models\Rumah;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


    //GET ALL PROVINCE
        $provincess = Province::orderby("name","asc")
                    ->select('id','name')->where('id',36)->get();
    //    
        $city= City::orderby("name","asc")
                    ->select('id','name')->where('id',3603)->get();

        $kategori = Kategori::all();


        $dataAll = Rumah::with('kota','kecamatan','kelurahan','kategoris')->get();
       

        $dataAngkaMasjid = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',1)->get();
        $angkaMasjid = $dataAngkaMasjid->count();

        $dataAngkaMushola = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',2)->get();
        $angkaMushola = $dataAngkaMushola->count();

        $dataGerejaKristen = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',3)->get();
        $angkaGerejaKristen = $dataGerejaKristen->count();

        $dataGerejaKatolik = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',4)->get();
        $angkaGerejaKatolik = $dataGerejaKatolik->count();

        $dataPureHindu = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',5)->get();
        $angkaPureHindu = $dataPureHindu->count();

        $dataPureBudha = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',6)->get();
        $angkaPureBudha = $dataPureBudha->count();

        $dataKelenteng = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('kategori_id')->where('kategori_id',7)->get();
        $angkaKelenteng = $dataKelenteng->count();

        
      

    
        // ->join('indonesia_cities', 'rumah_ibadah.city_id', '=', 'indonesia_cities.id')
        // ->where('kategori.id','=',1)
        // // ->select('rumah.*', 'contacts.phone', 'orders.price')
        // ->get();
    
       
        return view('layout.dashboard.index',compact(
            'provincess',
            'city',
            'kategori',
            'dataAll',
            'angkaMasjid',
            'angkaMushola',
            'angkaGerejaKristen',
            'angkaGerejaKatolik',
            'angkaPureHindu',
            'angkaPureBudha',
            'angkaKelenteng',
        
        ));
    }


    public function getCitys($province_id){

        $citysData['data'] = City::orderby("name","asc")
                   ->select('province_id','name')
                   ->where('province_id',$province_id)
                   ->get();
        echo( $citysData['data']);exit;
       return response()->json($citysData);
   }


   public function getDistrict($city_id){

    $districtData['data'] = Kecamatan::orderby("name","asc")
               // ->select('province_id','id','name')
               ->where('city_id',$city_id)
               ->get();
    // echo( $citysData['data']);exit;
   return response()->json($districtData);
}

public function getVillages($district_id){

        $villagesData['data'] = Kelurahan::orderby("name","asc")
                // ->select('province_id','id','name')
                ->where('district_id',$district_id)
                ->get();
        
        // echo( $citysData['data']);exit;
        return response()->json($villagesData);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //GET ALL PROVINCE
        $provincess = Province::orderby("name","asc")
                    ->select('id','name')->where('id',36)->get();
    //    
        $city= City::orderby("name","asc")
                    ->select('id','name')->where('id',3603)->get();

        
        $kategori = Kategori::all();
        return view('layout.rumah.add',compact('provincess','city','kategori'));
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


    public function data(Request $request)
    {
        //

        $rumah = new Rumah();
       
        $rumah->id = $request->get('id');
        $rumah->district_id =  $request->get('district_id');
        $rumah->villages_id = $request->get('villages_id');
        
        if ($request->ajax()) {
            

            if($rumah->id != ""){
                $data = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('id','nama','kategori_id','district_id','villages_id','alamat')->where('id',$rumah->id)->get();
               
           
            }
            elseif($rumah->district_id != ""){
                $data = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('id','nama','kategori_id','district_id','villages_id','alamat')->where('district_id',$rumah->district_id)->get();
               
           
            }else{
                $data = Rumah::with('kota','kecamatan','kelurahan','kategoris')->select('id','nama','kategori_id','district_id','villages_id','alamat')
                
                ->get();
            
            return Datatables()->of($data)->make(true);
        }

          

    }
    }

    public function dataindex(Request $request)
    {
        //
        
        return view('layout.dashboard.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function show(HomeModel $homeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeModel $homeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeModel $homeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeModel $homeModel)
    {
        //
    }
}
