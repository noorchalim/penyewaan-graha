@extends('layouts.app')

@section('content')
    <h1>Perlengkapan Details</h1>
    <p><strong>Nama:</strong> {{ $perlengkapan->nama_perlengkapan }}</p>
    <p><strong>Deskripsi:</strong> {{ $perlengkapan->deskripsi }}</p>
    <p><strong>Jumlah:</strong> {{ $perlengkapan->jumlah }}</p>
    <p><strong>Harga Sewa:</strong> {{ $perlengkapan->harga_sewa }}</p>
    <a href="{{ route('admin.perlengkapan.index') }}">Back to List</a>
@endsection
