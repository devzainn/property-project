@extends('layouts.app')

@section('title', 'Data Surat Pemesanan Rumah')

@section('contents')
    <hr />
    <form action="{{ route('bookings-letter.update', $bookingLetter->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Debitur</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_booking">Tanggal Booking</label>
                                    <input type="text" name="tgl_booking" class="form-control" value="{{ $bookingLetter->booking->tgl_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $bookingLetter->booking->buyer->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $bookingLetter->booking->buyer->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota - Provinsi</label>
                                    <input type="text" name="kota" class="form-control" value="{{ $bookingLetter->booking->buyer->kota }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" value="{{ $bookingLetter->booking->buyer->no_telp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="notaries_id">Nama Notaris</label>
                                    <select name="notaries_id" class="form-control">
                                        @foreach($notaries as $notary)
                                            <option value="{{ $notary->id }}" {{ $notary->id == $bookingLetter->notaries_id ? 'selected' : '' }}>{{ $notary->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bank_id">Nama Bank</label>
                                    <select name="bank_id" class="form-control">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ $bank->id == $bookingLetter->bank_id ? 'selected' : '' }}>{{ $bank->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" class="form-control" value="{{ $bookingLetter->booking->property->type }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="blok">Blok</label>
                                    <input type="text" name="blok" class="form-control" value="{{ $bookingLetter->booking->property->blok }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_tanah">Luas Tanah (m2)</label>
                                    <input type="text" name="luas_tanah" class="form-control" value="{{ $bookingLetter->booking->property->luas_tanah }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_bangunan">Luas Bangunan (m2)</label>
                                    <input type="text" name="luas_bangunan" class="form-control" value="{{ $bookingLetter->booking->property->luas_bangunan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="biaya_booking">Booking Fee</label>
                                    <input type="text" name="biaya_booking" id="biaya_booking" class="form-control" value="{{ $bookingLetter->booking->biaya_booking}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="down_payment_fee">Uang Muka</label>
                                    <input type="number" name="down_payment_fee" id="down_payment_fee" class="form-control" value="{{ $bookingLetter->down_payment_fee }}">
                                </div>
                                <div class="form-group">
                                    <label for="total_price">Total Biaya</label>
                                    <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $bookingLetter->total_price }}" readonly>
                                </div>

                                <div class="row mb-2 mx-1">
                                    <div class="d-grid gap-2 d-md-block">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                                        <a href="{{ route('bookings-letter.preview', $bookingLetter->id) }}" class="btn btn-secondary">Print</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </div>

    </form>

    <script>
        document.getElementById('down_payment_fee').addEventListener('input', function() {
            var biayaBooking = parseFloat(document.getElementById('biaya_booking').value);
            var downPayment = parseFloat(this.value);
            var total = biayaBooking + downPayment;
            document.getElementById('total_price').value = total.toFixed(2);
        });
    </script>
@endsection
