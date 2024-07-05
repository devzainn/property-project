@extends('layouts.app')

@section('title', 'Edit Data Arsip')

@section('contents')
    <hr />
    <form action="{{ route('archives.update', $archive->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Data Pembeli -->
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pembeli</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Pembeli</label>
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $archive->booking->buyer->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $archive->booking->buyer->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota" class="form-control" value="{{ $archive->booking->buyer->kota }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $archive->booking->buyer->tanggal_lahir }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" name="nik" class="form-control" value="{{ $archive->booking->buyer->nik }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="number" name="npwp" class="form-control" value="{{ $archive->booking->buyer->npwp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="bpjs">BPJS</label>
                                    <input type="number" name="bpjs" class="form-control" value="{{ $archive->booking->buyer->bpjs }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" value="{{ $archive->booking->buyer->no_telp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $archive->booking->buyer->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pasangan -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pasangan</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_lengkap_istri">Nama Pasangan</label>
                                    <input type="text" name="nama_lengkap_istri" class="form-control" value="{{ $archive->booking->spouse->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_istri">Alamat</label>
                                    <input type="text" name="alamat_istri" class="form-control" value="{{  $archive->booking->spouse->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota_istri">Kota/Kabupaten</label>
                                    <input type="text" name="kota_istri" class="form-control" value="{{  $archive->booking->spouse->kota }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_istri">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir_istri" class="form-control" value="{{  $archive->booking->spouse->tanggal_lahir }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik_istri">NIK</label>
                                    <input type="number" name="nik_istri" class="form-control" value="{{  $archive->booking->spouse->nik }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pekerjaan -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pekerjaan</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_instansi">Nama Instansi</label>
                                    <input type="text" name="nama_instansi" class="form-control" value="{{ $archive->buyer->pekerjaan->nama_instansi }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_instansi">Alamat Instansi</label>
                                    <input type="text" name="alamat_instansi" class="form-control" value="{{ $archive->buyer->pekerjaan->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="kota_instansi">Kota/Provinsi Instansi</label>
                                    <input type="text" name="kota_instansi" class="form-control" value="{{ $archive->buyer->pekerjaan->kota }}">
                                </div>
                                <div class="form-group">
                                    <label for="status_pekerjaan">Status Pekerjaan</label>
                                    <select name="status_pekerjaan" class="form-control">
                                        <option value="magang" {{ $archive->buyer->pekerjaan->status_pekerjaan == 'magang' ? 'selected' : '' }}>Magang</option>
                                        <option value="tetap" {{ $archive->buyer->pekerjaan->status_pekerjaan == 'tetap' ? 'selected' : '' }}>Tetap</option>
                                        <option value="freelance" {{ $archive->buyer->pekerjaan->status_pekerjaan == 'freelance' ? 'selected' : '' }}>Freelance</option>
                                        <option value="lainnya" {{ $archive->buyer->pekerjaan->status_pekerjaan == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="{{ $archive->buyer->pekerjaan->jabatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="gaji">Gaji</label>
                                    <input type="number" name="gaji" class="form-control" value="{{ $archive->buyer->pekerjaan->gaji }}">
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
                                    <label for="nama_marketing">Nama Marketing</label>
                                    <input type="text" name="nama_marketing" class="form-control" value="{{ $archive->booking->nama_marketing }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="property_id">Property</label>
                                    <input type="text" name="property_id" class="form-control" value="{{ $archive->booking->property->blok }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="blok">Blok</label>
                                    <input type="text" name="blok" id="blok" class="form-control" value="{{ $archive->booking->property->blok }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control" value="{{ $archive->booking->property->type }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_tanah">Luas Tanah (m2)</label>
                                    <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" value="{{ $archive->booking->property->luas_tanah }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_bangunan">Luas Bangunan (m2)</label>
                                    <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" value="{{ $archive->booking->property->luas_bangunan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $archive->booking->property->harga }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="penawaran_harga">Penawaran Harga</label>
                                    <input type="number" name="penawaran_harga" class="form-control" value="{{ $archive->booking->penawaran_harga }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="biaya_booking">Biaya Booking</label>
                                    <input type="number" name="biaya_booking" class="form-control" value="{{ $archive->booking->biaya_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jam_booking">Jam Booking</label>
                                    <input type="time" name="jam_booking" class="form-control" value="{{ $archive->booking->jam_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="metode_bayar">Metode Bayar</label>
                                    <input type="text" name="metode_bayar" class="form-control" value="{{ $archive->booking->metode_bayar }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status_pengajuan">Status Pengajuan</label>
                                    <input type="text" name="status_pengajuan" class="form-control" value="{{ $archive->booking->status_pengajuan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control">{{ $archive->booking->keterangan }}</textarea>
                                </div>

                                <!-- Data Arsip -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Arsip</h6>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $arsipFields = [
                                                'form_biru' => 'Form Biru',
                                                'buku_biru' => 'Buku Biru',
                                                'fc_ktp' => 'FC KTP',
                                                'fc_ktp_pasangan' => 'FC KTP Pasangan',
                                                'fc_npwp' => 'FC NPWP',
                                                'fc_kk' => 'FC KK',
                                                'fc_buku_nikah' => 'FC Buku Nikah',
                                                'sk_kerja' => 'SK Kerja',
                                                'slip_gaji' => 'Slip Gaji',
                                                'form_btn' => 'Form BTN',
                                                'rek_btn' => 'Rek BTN'
                                            ];
                                        @endphp
                                        @foreach ($arsipFields as $field => $label)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="arsip[]" value="{{ $field }}" id="{{ $field }}" {{ $archive->$field == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mb-2 mx-1">
                                    <div class="d-grid gap-2 d-md-block">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
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
        document.addEventListener('DOMContentLoaded', function () {
            var propertySelect = document.getElementById('property_select');

            propertySelect.addEventListener('change', function () {
                var selectedOption = propertySelect.options[propertySelect.selectedIndex];

                var blok = selectedOption.getAttribute('data-blok');
                var type = selectedOption.getAttribute('data-type');
                var luasTanah = selectedOption.getAttribute('data-luas_tanah');
                var luasBangunan = selectedOption.getAttribute('data-luas_bangunan');
                var harga = selectedOption.getAttribute('data-harga');
                var hoek = selectedOption.getAttribute('data-hoek');

                document.getElementById('blok').value = blok;
                document.getElementById('type').value = type;
                document.getElementById('luas_tanah').value = luasTanah;
                document.getElementById('luas_bangunan').value = luasBangunan;
                document.getElementById('harga').value = harga;
                document.getElementById('hoek').value = hoek;
            });

            // Trigger the change event to set the initial values
            var event = new Event('change');
            propertySelect.dispatchEvent(event);
        });
    </script>
@endsection
