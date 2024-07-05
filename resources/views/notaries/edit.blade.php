@extends('layouts.app')

@section('title', 'Edit Data Notaris')

@section('contents')
<div class="container">
    <form action="{{ route('notaries.update', $notary->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Notaris</h6>
            </div>
            <div class="card-body py-3 px-3">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $notary->name }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $notary->address }}" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telepon:</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $notary->no_telp }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status PPAT:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="active" {{ $notary->status == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ $notary->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('notaries.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection
