@extends('layouts.app')

@section('content')
    <h1>Edit Perlengkapan</h1>
    <form action="{{ route('admin.perlengkapan.update', $perlengkapan) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_perlengkapan">Nama:</label>
        <input type="text" id="nama_perlengkapan" name="nama_perlengkapan" value="{{ $perlengkapan->nama_perlengkapan }}" required>
        
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi">{{ $perlengkapan->deskripsi }}</textarea>
        
        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" value="{{ $perlengkapan->jumlah }}" required>
        
        <label for="harga_sewa">Harga Sewa:</label>
        <input type="number" id="harga_sewa" name="harga_sewa" step="0.01" value="{{ $perlengkapan->harga_sewa }}" required>
        
        <button type="submit">Update</button>
    </form>
@endsection
