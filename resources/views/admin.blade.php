@extends('layouts.template')
@section('form')        

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
              <th class="col-md-2">Aksi</th>
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
  <td>{!!'<a type="button" href="" class="btn btn-danger">Delete</a>','<a type="button" href="" class="btn btn-warning">Edit</a>' !!}</td>
  <td>{!! $item->validasi==0?'<a type="button" href="/task/acc/'.$item->id.'"class="btn btn-danger">Validasi</a>':'<a type="button" class="btn btn-success">Valid</a>' !!}</td>
  <td>{{ $item->created_at }}</td>
</tr>
  <?php $i++ ?>
  @endforeach
      </tbody>
  </table>
  {{ $task->withQueryString()->links() }}
 
</div>
<div class="pb-3">
<a href='/logout' class="btn btn-primary">Log Out</a>
</div>

@endsection