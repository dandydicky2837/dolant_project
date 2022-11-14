@extends('layouts.template')
@section('form')  
<!-- START FORM -->
<form action='{{url('dashboard')}}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-label">User Id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='user_id' id="user_id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_pekerjaan" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jenis_pekerjaan' id="jenis_pekerjaan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_channel" class="col-sm-2 col-form-label">Nama Channel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_channel' id="nama_channel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul_seri" class="col-sm-2 col-form-label">Judul Seri</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_seri' id="judul_seri">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan_kerja" class="col-sm-2 col-form-label">Keterangan Kerja</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='keterangan_kerja' id="keterangan_kerja">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="link" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='link' id="link">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_channel" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      </form>
    </div>
    <!-- AKHIR FORM -->
    @endsection