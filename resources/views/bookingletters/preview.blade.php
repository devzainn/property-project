@extends('layouts.app')

@section('title', 'Data Surat Pemesanan Rumah')

@section('contents')
    <hr />

    <div class="container">
        <div class="text-center">
            <h3>PT. HIKMAH ALAM SENTOSA</h3>
            <p>PERUMAHAN PESONA KAHURIPAN 11</p>
            <p>Perum Pesona Palad Blok A No.19 Cikahuripan, Klapanunggal. Bogor - Jawa Barat</p>
            <hr>
            <h4><u>Surat Pesanan Rumah (SPR)</u></h4>
        </div>
        <br>
        <div>
            <h5><strong>I. DATA PRIBADI</strong></h5>
            <p><strong>TANGGAL BOOKING:</strong> {{ $bookingLetter->booking->tgl_booking }}</p>
            <p><strong>ATAS NAMA:</strong> {{ $bookingLetter->booking->buyer->nama_lengkap }}</p>
            <p><strong>ALAMAT:</strong> {{ $bookingLetter->booking->buyer->alamat }}</p>
            <p><strong>KOTA/PROVINSI:</strong> {{ $bookingLetter->booking->buyer->kota }}</p>
            <p><strong>NO. IDENTITAS (KTP):</strong> {{ $bookingLetter->booking->buyer->nik }}</p>
            <p><strong>TELP/HP:</strong> {{ $bookingLetter->booking->buyer->no_telp }}</p>
            <br>
            <h5><strong>II. DATA PENDUKUNG</strong></h5>
            <p><strong>NOTARIS:</strong> {{ $bookingLetter->notaris->name ?? ''}}</p>
            <p><strong>BANK:</strong> {{ $bookingLetter->bank->nama_bank ?? '' }}</p>
            <br>
            <h5><strong>III. DATA KAVLING</strong></h5>
            <p><strong>TYPE:</strong> {{ $bookingLetter->booking->property->type }}</p>
            <p><strong>BLOK:</strong> {{ $bookingLetter->booking->property->blok }}</p>
            <p><strong>LUAS BANGUNAN:</strong> {{ $bookingLetter->booking->property->luas_bangunan }} m²</p>
            <p><strong>LUAS TANAH:</strong> {{ $bookingLetter->booking->property->luas_tanah }} m²</p>
            <br>
            <h5><strong>IV. PERINCIAN PEMBAYARAN</strong></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>KETERANGAN</th>
                        <th>BIAYA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>HARGA JUAL</td>
                        <td>{{ number_format($bookingLetter->booking->property->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>UANG MUKA</td>
                        <td>{{ number_format($bookingLetter->down_payment_fee ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>BIAYA BOOKING</td>
                        <td>{{ number_format($bookingLetter->booking->biaya_booking, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL PEMBAYARAN</strong></td>
                        <td><strong>{{ number_format($bookingLetter->total_price ?? 0, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>Bogor, ...........................</p>
            <br>
            <table class="table borderless" style="width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: center;">
                        <p><strong>KONSUMEN</strong></p>
                        <br><br><br>
                        <p>(.............................................)</p>
                    </td>
                    <td style="width: 50%; text-align: center;">
                        <p><strong>DEVELOPER</strong></p>
                        <br><br><br>
                        <p>(.............................................)</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('bookings-letter.print', $bookingLetter->id) }}" class="btn btn-primary">Print</a>
        </div>
    </div>

    <style>
        .table.borderless td, .table.borderless th {
            border: none;
        }
    </style>
@endsection
