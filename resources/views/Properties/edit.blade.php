@extends('layouts.app')
  
@section('title', 'Edit Data Unit Rumah')

@section('contents')
    <hr />
    <form action="{{ route('properties.update', $property->property_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Unit Rumah</h6>
            </div>
            <div class="card-body py-3 px-3">
                <div class="col">
                    <div class="row  mb-3">
                        <input type="text" name="blok" class="form-control" placeholder="Blok" value="{{ $property->blok }}" required>
                    </div>
                    <div class="row  mb-3">
                        <input type="text" name="type" class="form-control" placeholder="Type" value="{{ $property->type }}" required>
                    </div>
                    <div class="row  mb-3">
                        <input type="number" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" value="{{ $property->luas_bangunan }}" required>
                    </div>
                    <div class="row  mb-3">
                        <input type="number" name="luas_tanah" class="form-control" placeholder="Luas Tanah" value="{{ $property->luas_tanah }}" required>
                    </div>
                </div>
                <div class="row  mb-3">
                    <div class="col">
                        <input type="numer" name="harga" class="form-control" class="harga" placeholder="Harga" value="{{ $property->harga }}" required>
                    </div>
                    <div class="col">
                        <input type="number" name="hoek" class="form-control" placeholder="Nominal Hoek" value="{{ $property->hoek }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col"> 
                        <input type="text" name="hgb_induk" class="form-control" placeholder="HGB Induk" value="{{ $property->hgb_induk }}">
                    </div>
                    <div class="col">
                        <input type="text" name="hgb_pecahan" class="form-control" placeholder="HGB Pecahan" value="{{ $property->hgb_pecahan }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="imb_induk" class="form-control" placeholder="IMB Induk" value="{{ $property->imb_induk }}">
                    </div>
                    <div class="col">
                        <input type="text" name="imb_pecahan" class="form-control" placeholder="IMB Pecahan" value="{{ $property->imb_pecahan }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <textarea class="form-control" name="keterangan" placeholder="Keterangan">{{ $property->keterangan }}</textarea>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
