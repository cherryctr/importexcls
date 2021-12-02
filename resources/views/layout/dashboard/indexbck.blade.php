@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
    <div class="grey-bg container-fluid">
    <section id="minimal-statistics">
        <div class="row">
        <div class="col-12 mt-3 mb-1">
            <div class="alert alert-success bg-cyan">
            WELCOME , {{ Auth::user()->name }}
            </div>
            
           
        </div>
        </div>
       
    
        <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaMasjid }}</h3>
                    <span>MASJID</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/mosque.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaMushola }}</h3>
                    <span>MUSHOLA</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/mushola.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaGerejaKristen }}</h3>
                    <span>GEREJA KERISTEN</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/gerejakristen.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaGerejaKatolik }}</h3>
                    <span>GEREJA KATOLIK</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/gerejakatolik.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaPureHindu }}</h3>
                    <span>PURE HINDU</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/lempuyang-temple.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaPureHindu }}</h3>
                    <span>PURE BUDHA</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/buddha.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 class="danger">{{ $angkaKelenteng }}</h3>
                    <span>KELENTENG KONGHUCHU</span>
                    </div>
                    <div class="align-self-center">
                    <img class="gambar-side" src="{{ asset('image/pagoda.png') }}" alt="">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        
     
        </div>
    
       
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DAFTAR DATA RUMAH IBADAH - Wilayah Kabupaten Tangerang</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                            <label for="email">{{ __('Pilih Kabupaten') }}</label>

                            
                            <select class="form-control filter" id="city" name="id">
                                <option> --- PILIH KABUPATEN--- </option>
                                @foreach ($city as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach 
                                
                            </select>
                            
                        </div>
              </div>

              
              <div class="col-md-4">
                      <div class="form-group">
                      <label for="email" >{{ __('Pilih Kecamatan') }}</label>

                            
                            

                           
                              
                                    <!-- <input type="text" name="province_id" id="city"> -->
                                    
                                    <select name="district_id" class="form-control filter" id="district">
                                    <option value="0">-- PILIH --</option>

                                </select>
                            
                            
                        </div>
</div>

                        <div class="col-md-4">
                <div class="form-group">
                            <label for="email">{{ __('Pilih Kelurahan') }}</label>

                            
                            <select class="form-control filter" id="villages" name="villages_id">
                                <option value="0"> --- PILIH KABUPATEN--- </option>
                            </select>
                        </div>
              </div>
                        

                        

              </div>
              
              <div class="divider"></div>
              <br>
              <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                          
                            <th>Kategori</th>
                            <th>Nama Tempat Ibadah</th>
                           
                            <th>Kabupaten</th>
                            

                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('layout.modal.modal')
      
    </div>
    </div>

    
</div>
@endsection