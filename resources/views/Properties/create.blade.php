@extends('layouts.app')
  
@section('title', 'Tambah Data Unit Rumah')
  
@section('contents')
    <hr />
    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Unit Rumah</h6>
            </div>
            <div class="card-body py-3 px-3">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="blok">Blok</label>
                                <input type="text" name="blok" class="form-control" placeholder="Blok" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" placeholder="Type" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="number" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="luas_tanah">Luas Tanah</label>
                                <input type="number" name="luas_tanah" class="form-control" placeholder="Luas Tanah" required>
                            </div>
                        </div>
                    </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="hoek">Nominal Hoek</label>
                            <input type="number" name="hoek" class="form-control" placeholder="Nominal Hoek" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="hgb_induk">HGB Induk</label>
                            <input type="text" name="hgb_induk" class="form-control" placeholder="HGB Induk">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="hgb_pecahan">HGB Pecahan</label>
                            <input type="text" name="hgb_pecahan" class="form-control" placeholder="HGB Pecahan">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="imb_induk">IMB Induk</label>
                            <input type="text" name="imb_induk" class="form-control" placeholder="IMB Induk">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="imb_pecahan">IMB Pecahan</label>
                            <input type="text" name="imb_pecahan" class="form-control" placeholder="IMB Pecahan">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
