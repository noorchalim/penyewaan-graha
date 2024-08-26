<!-- resources/views/transactions/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Detail Transaksi</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $transaction->order_id }}</h5>
            <p class="card-text">Gross Amount: {{ $transaction->gross_amount }}</p>
            <p class="card-text">Status Transaksi: {{ $transaction->transaction_status }}</p>
            <p class="card-text">Permohonan Sewa ID: {{ $transaction->permohonan_sewa_id }}</p>
            <p class="card-text">Tanggal Dibuat: {{ $transaction->created_at }}</p>
            <p class="card-text">Tanggal Diubah: {{ $transaction->updated_at }}</p>
        </div>
    </div>

    <h2 class="mt-5">Detail Permohonan Sewa</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Penyewa: {{ $transaction->permohonanSewa->nama_penyewa }}</h5>
            <p class="card-text">Tanggal Sewa: {{ $transaction->permohonanSewa->tanggal_sewa }}</p>
            <p class="card-text">Waktu Sewa: {{ $transaction->permohonanSewa->waktu_sewa }}</p>
            <p class="card-text">Jumlah Orang: {{ $transaction->permohonanSewa->jumlah_orang }}</p>
            <p class="card-text">Keperluan: {{ $transaction->permohonanSewa->keperluan }}</p>
            <p class="card-text">Keperluan: {{ $transaction->permohonanSewa->kategori_id }}</p>
            
            <!-- Display the Kategori information -->
            {{-- <p class="card-text">Kategori: {{ $transaction->permohonanSewa->kategori->nama_kategori }}</p> --}}
        </div>
    </div>

    {{-- <h3 class="mt-5">Perlengkapan yang Disewa</h3>
    <ul class="list-group">
        @foreach($transaction->permohonanSewa->perlengkapan as $perlengkapan)
            <li class="list-group-item">
                Nama: {{ $perlengkapan->namaPerlengkapan }} <br>
                Deskripsi: {{ $perlengkapan->deskripsi }} <br>
                Jumlah: {{ $perlengkapan->pivot->jumlah }} <br>
                Harga Sewa: {{ $perlengkapan->hargaSewa }}
            </li>
        @endforeach
    </ul> --}}
</div>
@endsection
