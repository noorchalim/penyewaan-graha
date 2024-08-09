@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <small>Leave blank to keep the current password</small>
        </div>
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="penyewa" {{ $user->role == 'penyewa' ? 'selected' : '' }}>Penyewa</option>
                <option value="vendor" {{ $user->role == 'vendor' ? 'selected' : '' }}>Vendor</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit">Update User</button>
    </form>
@endsection
