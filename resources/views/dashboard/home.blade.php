@extends('layouts.template')
@section('form')        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">User Id</th>
                            <th class="col-md-4">Jenis Pekerjaan</th>
                            <th class="col-md-2">Nama Channel</th>
                            <th class="col-md-2">Judul Seri</th>
                            <th class="col-md-2">Keterangan Kerja</th>
                            <th class="col-md-2">Link</th>
                            <th class="col-md-2">Validasi</th>
                            <th class="col-md-2">Tanggal</th>

                        </tr>
                    </thead>
                </table>
               
          </div>
          <!-- AKHIR DATA -->   
@endsection
       