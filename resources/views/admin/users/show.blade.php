@extends('layouts.app')

@section('content')
    <h1>User Details</h1>

    <div>
        <strong>ID:</strong> {{ $user->id }}
    </div>
    <div>
        <strong>Username:</strong> {{ $user->username }}
    </div>
    <div>
        <strong>Role:</strong> {{ ucfirst($user->role) }}
    </div>
    <div>
        <strong>Created At:</strong> {{ $user->created_at->format('d-m-Y H:i') }}
    </div>
    <div>
        <strong>Updated At:</strong> {{ $user->updated_at->format('d-m-Y H:i') }}
    </div>

    <a href="{{ route('admin.users.index') }}">Back to List</a>
    <a href="{{ route('admin.users.edit', $user) }}">Edit User</a>
    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete User</button>
    </form>
@endsection
