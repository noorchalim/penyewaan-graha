<!-- resources/views/kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Daftar permohonan sewa</div>

                    <div class="card-body">
                        {{-- <a href="{{ route('admin.permohonansewa.create') }}" class="btn btn-primary mb-3">Tambah Permohonan Sewa Baru</a> --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Keperluan</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonans as $permohonan)
                                    <tr>

                                        <th scope="row">{{ $permohonan->user->username  }}</th>
                                        <td>{{ $permohonan->nama }}</td>
                                        {{-- <td>{{ $permohonan->pekerjaan }}</td> --}}
                                        <td>{{ $permohonan->no_hp }}</td>
                                        {{-- <td>{{ $permohonan->alamat }}</td> --}}
                                        {{-- <td>{{ $permohonan->jam }}</td> --}}
                                        <td>{{ $permohonan->keperluan }}</td>
                                        <td>{{ $permohonan->kategori->paket }}</td>
                                        <td>{{ $permohonan->vendor ? $permohonan->vendor->nama_perusahaan : 'N/A' }}</td>
                                        <td>{{ $permohonan->status }}</td>
                                        <td>
                                             <a href="{{ route('admin.permohonansewa.editAdminPermohonanSewa', $permohonan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                             {{-- <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button> --}}
                                            {{-- </form> --}}
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
