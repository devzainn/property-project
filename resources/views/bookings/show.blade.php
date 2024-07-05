@extends('layouts.app')

@section('title', 'Edit Data Booking')

@section('contents')
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
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $booking->buyer->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $booking->buyer->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota" class="form-control" value="{{ $booking->buyer->kota }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $booking->buyer->tanggal_lahir }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" name="nik" class="form-control" value="{{ $booking->buyer->nik }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="number" name="npwp" class="form-control" value="{{ $booking->buyer->npwp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="bpjs">BPJS</label>
                                    <input type="number" name="bpjs" class="form-control" value="{{ $booking->buyer->bpjs }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" value="{{ $booking->buyer->no_telp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $booking->buyer->email }}" readonly>
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
                                    <input type="text" name="nama_lengkap_istri" class="form-control" value="{{  $booking->spouse->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_istri">Alamat</label>
                                    <input type="text" name="alamat_istri" class="form-control" value="{{  $booking->spouse->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota_istri">Kota</label>
                                    <input type="text" name="kota_istri" class="form-control" value="{{  $booking->spouse->kota }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_istri">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir_istri" class="form-control" value="{{  $booking->spouse->tanggal_lahir }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik_istri">NIK</label>
                                    <input type="number" name="nik_istri" class="form-control" value="{{  $booking->spouse->nik }}" readonly>
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
                                    <input type="text" name="nama_marketing" class="form-control" value="{{ $booking->nama_marketing }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="property_id">Property</label>
                                    <select name="property_id" class="form-control" id="property_select" readonly>
                                        <option value="">Select Property</option>
                                        @foreach($property as $item)
                                            <option value="{{ $item->id }}"
                                                data-blok="{{ $item->blok }}"
                                                data-type="{{ $item->type }}"
                                                data-luas_tanah="{{ $item->luas_tanah }}"
                                                data-luas_bangunan="{{ $item->luas_bangunan }}"
                                                data-harga="{{ $item->harga }}"
                                                data-hoek="{{ $item->hoek }}"
                                                {{ $item->id == $booking->item_id ? 'selected' : '' }}
                                            >{{ $item->blok }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="blok">Blok</label>
                                    <input type="text" name="blok" id="blok" class="form-control" value="{{ $booking->blok }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control" value="{{ $booking->type }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_tanah">Luas Tanah (m2)</label>
                                    <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" value="{{ $booking->luas_tanah }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="luas_bangunan">Luas Bangunan (m2)</label>
                                    <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" value="{{ $booking->luas_bangunan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="hoek">Hoek</label>
                                    <input type="text" name="hoek" id="hoek" class="form-control" value="{{ $booking->hoek }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $booking->harga }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="penawaran_harga">Penawaran Harga</label>
                                    <input type="number" name="penawaran_harga" class="form-control" value="{{ $booking->penawaran_harga }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="biaya_booking">Biaya Booking</label>
                                    <input type="number" name="biaya_booking" class="form-control" value="{{ $booking->biaya_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_booking">Tanggal Booking</label>
                                    <input type="date" name="tgl_booking" class="form-control" value="{{ $booking->tgl_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jam_booking">Jam Booking</label>
                                    <input type="time" name="jam_booking" class="form-control" value="{{ $booking->jam_booking }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="metode_bayar">Metode Bayar</label>
                                    <select name="metode_bayar" class="form-control" readonly>
                                        <option value="cash" {{ $booking->metode_bayar == 'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="transfer" {{ $booking->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_pengajuan">Status Pengajuan</label>
                                    <select name="status_pengajuan" class="form-control" readonly>
                                        <option value="kosong" {{ $booking->status_pengajuan == 'kosong' ? 'selected' : '' }}>Kosong</option>
                                        <option value="booking" {{ $booking->status_pengajuan == 'booking' ? 'selected' : '' }}>Booking</option>
                                        <option value="reject" {{ $booking->status_pengajuan == 'reject' ? 'selected' : '' }}>Reject</option>
                                        <option value="SP3K" {{ $booking->status_pengajuan == 'SP3K' ? 'selected' : '' }}>SP3K</option>
                                        <option value="kantor" {{ $booking->status_pengajuan == 'kantor' ? 'selected' : '' }}>Kantor</option>
                                        <option value="bank" {{ $booking->status_pengajuan == 'bank' ? 'selected' : '' }}>Bank</option>
                                        <option value="banding" {{ $booking->status_pengajuan == 'banding' ? 'selected' : '' }}>Banding</option>
                                        <option value="rencana_akad" {{ $booking->status_pengajuan == 'rencana_akad' ? 'selected' : '' }}>Rencana Akad</option>
                                        <option value="akad" {{ $booking->status_pengajuan == 'akad' ? 'selected' : '' }}>Akad</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" readonly>{{ $booking->keterangan }}</textarea>
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

