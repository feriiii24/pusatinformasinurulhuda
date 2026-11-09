@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card-style mb-30">
    <h6 class="mb-20">Edit Informasi Administrasi</h6>
    <form action="#" method="POST">
      @csrf
      <div class="input-style-1">
        <label>Judul</label>
        <input type="text" name="judul" value="{{ $item->judul_informasi ?? $item->judul }}" required />
      </div>
      <div class="input-style-1">
        <label>Isi Informasi</label>
        <textarea name="isi" rows="6">{{ $item->deskripsi ?? $item->isi ?? '' }}</textarea>
      </div>
      <div class="modal-footer mt-20">
        <a href="{{ url()->previous() }}" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
