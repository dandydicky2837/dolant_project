<div style="padding-top: 200;">
@extends('layouts.template')
@section('form')  
<!-- START FORM -->
<form action="{{url('/create/add')}}" method='post'>
    @csrf
        <div class="mb-3 row" >
            <label for="jenis_pekerjaan" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jenis_pekerjaan' id="jenis_pekerjaan" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_channel" class="col-sm-2 col-form-label">Nama Channel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_channel' id="nama_channel"required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul_seri" class="col-sm-2 col-form-label">Judul Seri</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_seri' id="judul_seri"required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan_kerja" class="col-sm-2 col-form-label">Keterangan Kerja</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='keterangan_kerja' id="keterangan_kerja"required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="link" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='link' id="link"required>
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
</div>