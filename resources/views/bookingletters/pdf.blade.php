<!DOCTYPE html>
<html>
<head>
    <title>Surat Pesanan Rumah (SPR)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        h4 {
            font-size: 13px;
            text-align: center;
        }

        h5 {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .borderless td, .borderless th {
            border: none;
        }

        .details {
            margin-bottom: 15px;
        }

        .details p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h3>PT. HIKMAH ALAM SENTOSA</h3>
            <p>PERUMAHAN PESONA KAHURIPAN 11</p>
            <p>Perum Pesona Palad Blok A No.19 Cikahuripan, Klapanunggal. Bogor - Jawa Barat</p>
            <hr>
            <h4><u>Surat Pesanan Rumah (SPR)</u></h4>
        </div>
        <div class="details">
            <h5><strong>I. DATA PRIBADI</strong></h5>
            <p><strong>Tanggal Booking:</strong> {{ $bookingLetter->booking->tgl_booking }}</p>
            <p><strong>Atas Nama:</strong> {{ $bookingLetter->booking->buyer->nama_lengkap }}</p>
            <p><strong>Alamat:</strong> {{ $bookingLetter->booking->buyer->alamat }}</p>
            <p><strong>Kota/Provinsi:</strong> {{ $bookingLetter->booking->buyer->kota }}</p>
            <p><strong>NIK (KTP):</strong> {{ $bookingLetter->booking->buyer->nik }}</p>
            <p><strong>Telp/HP:</strong> {{ $bookingLetter->booking->buyer->no_telp }}</p>

            <h5><strong>II. DATA PENDUKUNG</strong></h5>
            <p><strong>Notaris:</strong>  {{ $bookingLetter->notaris->name ?? '' }}</p>
            <p><strong>Bank:</strong> {{ $bookingLetter->bank->nama_bank ?? '' }}</p>

            <h5><strong>III. DATA KAVLING</strong></h5>
            <p><strong>Type:</strong> {{ $bookingLetter->booking->property->type }}</p>
            <p><strong>Blok:</strong> {{ $bookingLetter->booking->property->blok }}</p>
            <p><strong>Luas Bangunan:</strong> {{ $bookingLetter->booking->property->luas_bangunan }} m²</p>
            <p><strong>Luas Tanah:</strong> {{ $bookingLetter->booking->property->luas_tanah }} m²</p>

            <h5><strong>IV. PERINCIAN PEMBAYARAN</strong></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 70%;">Keterangan</th>
                        <th style="width: 30%;">Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Harga Jual</td>
                        <td>{{ number_format($bookingLetter->booking->property->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Uang Muka</td>
                        <td>{{ number_format($bookingLetter->down_payment_fee ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Biaya Booking</td>
                        <td>{{ number_format($bookingLetter->booking->biaya_booking, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total Pembayaran</strong></td>
                        <td><strong>{{ number_format($bookingLetter->total_price ?? 0, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
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
    </div>
</body>
</html>
