<!-- resources/views/kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Daftar Kategori</div>

                    <div class="card-body">
                        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori Baru</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jam</th>
                                    {{-- <th scope="col">jam_selesai</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <th scope="row">{{ $kategori->id }}</th>
                                        <td>{{ $kategori->paket }}</td>
                                        <td>{{ $kategori->deskripsi }}</td>
                                        <td>{{ $kategori->harga }}</td>
                                        <td>{{ $kategori->jam }}</td>
                                        {{-- <td>{{ $kategori->jam_selesai }}</td> --}}
                                        <td>
                                            <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
