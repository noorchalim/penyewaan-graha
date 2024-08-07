@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Perlengkapan List</h1>
        <a href="{{ route('admin.perlengkapan.create') }}" class="btn btn-primary mb-3">Add New Perlengkapan</a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Harga Sewa</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perlengkapans as $perlengkapan)
                        <tr>
                            <td>{{ $perlengkapan->nama_perlengkapan }}</td>
                            <td>{{ $perlengkapan->deskripsi ?? 'N/A' }}</td>
                            <td>{{ $perlengkapan->jumlah }}</td>
                            <td>Rp {{ number_format($perlengkapan->harga_sewa, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.perlengkapan.edit', $perlengkapan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.perlengkapan.destroy', $perlengkapan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
