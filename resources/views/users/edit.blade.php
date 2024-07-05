@extends('layouts.app')

@section('title', 'Edit Data Pengguna')

@section('contents')
<div class="container">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-3">
            <div class="card-body py-3 px-3">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (ubah jika ingin mengganti):</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="marketing" {{ $user->role == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="manajer" {{ $user->role == 'manajer' ? 'selected' : '' }}>Manajer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection
