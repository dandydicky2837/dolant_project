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
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

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
                <td>{!! $item->Aksi, '<a type="button" class="btn btn-warning" href="'.url('/task/edit/'.$item->id).'"">Edit</a>'!!}</td>
                <td>{!! $item->validasi==0?'<a type="button" class="btn btn-danger">Unvalid</a>':'<a type="button" class="btn btn-success">Valid</a>' !!}</td>
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
       