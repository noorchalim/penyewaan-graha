@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create New User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="penyewa" {{ old('role') == 'penyewa' ? 'selected' : '' }}>Penyewa</option>
                    <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
