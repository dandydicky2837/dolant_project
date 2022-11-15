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
                  <a href='/create' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Nama</th>
                            <th class="col-md-4">Jenis Pekerjaan</th>
                            <th class="col-md-2">Nama Channel</th>
                            <th class="col-md-2">Judul Seri</th>
                            <th class="col-md-2">Keterangan Kerja</th>
                            <th class="col-md-2">Link</th>
                            <th class="col-md-2">Validasi</th>
                            <th class="col-md-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php $i = $task->firstItem() ?>
                @foreach ($task as $item)
                <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->jenis_pekerjaan }}</td>
                <td>{{ $item->nama_channel }}</td>
                <td>{{ $item->judul_seri }}</td>
                <td>{{ $item->keterangan_kerja }}</td>
                <td>{{ $item->link }}</td>
                <td>{{ $item->validasi==0?'unvalidated':'validate' }}</td>
                <td>{{ $item->created_at }}</td>
                </tr>
                <?php $i++ ?>
                @endforeach
                    </tbody>
                </table>
                {{ $task->withQueryString()->links() }}
               
          </div>
          <!-- AKHIR DATA -->   
@endsection
       