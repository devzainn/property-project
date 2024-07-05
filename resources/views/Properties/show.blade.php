@extends('layouts.app')
  
@section('title', 'Lihat Data')
  
@section('contents')
    <hr />
    <div class="card shadow mb-3">
        
        <div class="card-body py-3 px-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Unit Rumah</h6>
            </div>
            <div class="col">
                <div class="row  mb-3">
                    <input type="text" name="blok" class="form-control" placeholder="Blok" value="{{ $property->blok }}" readonly>
                </div>
                <div class="row  mb-3">
                    <input type="text" name="type" class="form-control" placeholder="Type" value="{{ $property->type }}" readonly>
                </div>
                <div class="row  mb-3">
                    <input type="text" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" value="{{ $property->luas_bangunan }}" readonly>
                </div>
                <div class="row  mb-3">
                    <input type="text" name="luas_tanah" class="form-control" placeholder="Luas Tanah" value="{{ $property->luas_tanah }}" readonly>
                </div>
            </div>
            <div class="row  mb-3">
                <div class="col">
                    <input type="text" name="harga" class="form-control" class="harga" placeholder="Harga" value="{{ $property->harga }}" readonly>
                </div>
                <div class="col">
                    <input type="number" name="hoek" class="form-control" placeholder="Nominal Hoek" value="{{ $property->hoek }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="hgb_induk" class="form-control" placeholder="HGB Induk" value="{{ $property->hgb_induk }}" readonly>
                </div>
                <div class="col">
                    <input type="text" name="hgb_pecahan" class="form-control" placeholder="HGB Pecahan" value="{{ $property->hgb_pecahan }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="imb_induk" class="form-control" placeholder="IMB Induk" value="{{ $property->imb_induk }}" readonly>
                </div>
                <div class="col">
                    <input type="text" name="imb_pecahan" class="form-control" placeholder="IMB Pecahan" value="{{ $property->imb_pecahan }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan" readonly>{{ $property->keterangan }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Created At</label>
                    <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $property->created_at }}" readonly>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Updated At</label>
                    <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $property->updated_at }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection

