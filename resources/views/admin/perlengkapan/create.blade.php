@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Add New Perlengkapan</h1>
        <form action="{{ route('admin.perlengkapan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_perlengkapan">Nama:</label>
                <input type="text" id="nama_perlengkapan" name="nama_perlengkapan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga_sewa">Harga Sewa:</label>
                <input type="number" id="harga_sewa" name="harga_sewa" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
