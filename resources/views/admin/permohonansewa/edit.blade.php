@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Edit Permohonan Sewa</div>

                    <div class="card-body">
                        <form action="{{ route('admin.permohonansewa.updateAdminPermohonanSewa', $permohonan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <p id="username" class="form-control-plaintext">{{ $permohonan->user->username }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <p id="nama" class="form-control-plaintext">{{ $permohonan->nama }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <p id="no_hp" class="form-control-plaintext">{{ $permohonan->no_hp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori_id">Paket</label>
                                        <p id="kategori_id" class="form-control-plaintext">{{ $permohonan->kategori->paket }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <p id="keperluan" class="form-control-plaintext">{{ $permohonan->keperluan }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vendor_id">Vendor</label>
                                        <p id="vendor_id" class="form-control-plaintext">{{ $permohonan->vendor ? $permohonan->vendor->nama_perusahaan : 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Tanggal Multiple Inputs --}}
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="tanggal">Tanggal</label>
                                    @foreach ($permohonan->tanggal as $index => $date)
                                        <div class="form-group">
                                            <label for="tanggal_{{ $index }}">Tanggal {{ $index + 1 }}</label>
                                            <input type="date" class="form-control" id="tanggal_{{ $index }}" name="tanggal[]"
                                                   value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" required>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="ditinjau" {{ $permohonan->status == 'ditinjau' ? 'selected' : '' }}>Ditinjau</option>
                                    <option value="disetujui" {{ $permohonan->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="ditolak" {{ $permohonan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('admin.permohonansewa.getAdminPermohonanSewa') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
