@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Tambah Kategori Baru</div>

                    <div class="card-body">
                        <form action="{{ route('admin.kategori.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="paket">Paket</label>
                                <input type="text" class="form-control" id="paket" name="paket" value="{{ old('paket') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" step="0.01" value="{{ old('harga') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <input type="text" class="form-control" id="jam" name="jam" placeholder="08:00-14:00" value="{{ old('jam') }}" required>
                                <small class="form-text text-muted">Format: HH:MM-HH:MM</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
