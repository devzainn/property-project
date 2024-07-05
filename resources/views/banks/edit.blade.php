@extends('layouts.app')

@section('title', 'Edit Data Bank')

@section('contents')
<hr />
<form action="{{ route('banks.update', $bank->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Bank</h6>
            </div>
            <div class="card body py-3 px-3">
                <div class="form-group">
                    <label for="nama_bank">Nama Bank:</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ $bank->nama_bank }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_cabang">Nama Cabang:</label>
                    <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" value="{{ $bank->nama_cabang }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat_cabang">Alamat:</label>
                    <input type="text" class="form-control" id="alamat_cabang" name="alamat_cabang" value="{{ $bank->alamat_cabang }}" required>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon_cabang">No. Telepon:</label>
                    <input type="text" class="form-control" id="nomor_telepon_cabang" name="nomor_telepon_cabang" value="{{ $bank->nomor_telepon_cabang }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('banks.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
