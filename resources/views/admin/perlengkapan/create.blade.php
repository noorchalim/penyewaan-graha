@extends('layouts.app')

@section('content')
    <h1>Add New Perlengkapan</h1>
    <form action="{{ route('admin.perlengkapan.store') }}" method="POST">
        @csrf
        <label for="nama_perlengkapan">Nama:</label>
        <input type="text" id="nama_perlengkapan" name="nama_perlengkapan" required>
        
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi"></textarea>
        
        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" required>
        
        <label for="harga_sewa">Harga Sewa:</label>
        <input type="number" id="harga_sewa" name="harga_sewa" step="0.01" required>
        
        <button type="submit">Save</button>
    </form>
@endsection
