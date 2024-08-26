<!-- resources/views/transactions/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Transaksi</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Gross Amount</th>
                <th>Status Transaksi</th>
                <th>Permohonan Sewa ID</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->order_id }}</td>
                    <td>{{ $transaction->gross_amount }}</td>
                    <td>{{ $transaction->transaction_status }}</td>
                    <td>{{ $transaction->permohonan_sewa_id }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
