<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/logo.png">    Dolant Kreatif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@extends('layouts.template')
@section('form')        
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>	
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>	
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>	
  <strong>{{ $message }}</strong>
</div>
@endif

<div style="padding-top: 50px">
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand"></a>
      <form class="d-flex" role="search" action="/home/search" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav> 
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
  <td>{!!'<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal'.$item->id.'">Hapus</button><br><br>',
        '<form action="task/edit/'.$item->id.'" method="GET"><input type="submit" value="Edit" class="btn btn-warning"></form>' !!}</td>
  <td>{!! $item->validasi==0?'<a type="button" href="/task/acc/'.$item->id.'"class="btn btn-danger">Validasi</a>':'<a type="button" class="btn btn-success">Valid</a>' !!}</td>
  <td>{{ $item->created_at }}</td>
</tr>
  <?php $i++ ?>
  @endforeach
      </tbody>
  </table>
</div>
  {{ $task->withQueryString()->links() }}
 
</div>

@foreach ($task as $item)
<!-- Modal -->
<div class="modal fade" id="Modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Apakah anda yakin ingin menghapus data?</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        Jenis pekerjaan : {{$item->jenis_pekerjaan}}<br>
        Nama Channel : {{$item->nama_channel}}<br>
        Judul Seri : {{$item->judul_seri}}<br>
        Keterangan Kerja : {{$item->keterangan_kerja}}<br>
        Link : {{$item->link}}<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
          {!!'<form action="task/'.$item->id.'" method="POST"><input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'.csrf_token().'"><input type="submit" value="Hapus" class="btn btn-danger"></form>'!!}
        </div>
      </div>
    </div>
  </div>
@endforeach


@endsection