<?php

namespace App\Http\Controllers;

use App\DataTables\ArchivesDataTable;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\Booking;
use App\Models\Buyer;
use App\Models\Spouse;
use App\Models\Property;
use App\Models\Notary;
use App\Models\Bank;
use App\Models\WorkOfBuyer;

class ArchiveController extends Controller
{
    public function index(ArchivesDataTable $dataTable)
    {
        return $dataTable->render('archives.index');
    }

    public function create()
    {
        $buyer = Buyer::all();
        $spouse = Spouse::all();
        $property = Property::all();
        $notary = Notary::all();
        $bank = Bank::all();

        return view('bookings.create', compact('buyer', 'spouse', 'property', 'notary', 'bank'));
    }

    public function store(Request $request)
    {
        $buyer = new Buyer();
        $buyer->nama_lengkap = $request->nama_lengkap;
        $buyer->alamat = $request->alamat;
        $buyer->kota = $request->kota;
        $buyer->tanggal_lahir = $request->tanggal_lahir;
        $buyer->nik = $request->nik;
        $buyer->npwp = $request->npwp;
        $buyer->bpjs = $request->bpjs;
        $buyer->no_telp = $request->no_telp;
        $buyer->email = $request->email;
        $buyer->save();

        $spouse = new Spouse();
        $spouse->nama_lengkap = $request->nama_lengkap_Istri;
        $spouse->alamat = $request->alamat_Istri;
        $spouse->kota = $request->kota_Istri;
        $spouse->tanggal_lahir = $request->tanggal_lahir_Istri;
        $spouse->nik = $request->nik_Istri;
        $spouse->buyer_id = $buyer->buyer_id;
        $spouse->save();

        $property = new Property();
        $property->blok = $request->blok;
        $property->type = $request->type;
        $property->luas_tanah = $request->luas_tanah;
        $property->luas_bangunan = $request->luas_bangunan;
        $property->harga = $request->harga;
        $property->hoek = $request->hoek;
        $property->save();

        $booking = new Booking();
        $booking->nama_marketing = $request->nama_marketing;
        $booking->penawaran_harga = $request->penawaran_harga;
        $booking->biaya_booking = $request->biaya_booking;
        $booking->jam_booking = $request->jam_booking;
        $booking->metode_bayar = $request->metode_bayar;
        $booking->status_pengajuan = $request->status_pengajuan;
        $booking->keterangan = $request->keterangan;
        $booking->buyer_id = $buyer->buyer_id;
        $booking->spouse_id = $spouse->spouse_id;
        $booking->property_id = $property->property_id;
        $booking->save();

        $notary = new Notary();
        $notary->nama_notaris = $request->nama_notaris;
        $notary->alamat = $request->alamat;
        $notary->kota = $request->kota;
        $notary->no_telp = $request->no_telp;
        $notary->save();

        $bank = new Bank();
        $bank->nama_bank = $request->nama_bank;
        $bank->no_rekening = $request->no_rekening;
        $bank->atas_nama = $request->atas_nama;
        $bank->save();

        $archive = new Archive();
        $archive->booking_id = $booking->booking_id;
        $archive->buyer_id = $buyer->buyer_id;
        $archive->spouse_id = $spouse->spouse_id;
        $archive->property_id = $property->property_id;
        $archive->notary_id = $notary->notary_id;
        $archive->bank_id = $bank->bank_id;
        $archive->form_biru = $request->form_biru;
        $archive->buku_biru = $request->buku_biru;
        $archive->fc_ktp = $request->fc_ktp;
        $archive->fc_ktp_pasangan = $request->fc_ktp_pasangan;
        $archive->fc_npwp = $request->fc_npwp;
        $archive->fc_kk = $request->fc_kk;
        $archive->fc_buku_nikah = $request->fc_buku_nikah;
        $archive->sk_kerja = $request->sk_kerja;
        $archive->slip_gaji = $request->slip_gaji;
        $archive->form_btn = $request->form_btn;
        $archive->rek_btn = $request->rek_btn;
        $archive->save();
        return redirect()->route('archives.index')->with('success', 'Archive created successfully.');
    }

    public function show($id)
    {
        $archive = Archive::findOrFail($id);
        $buyer = Buyer::all();
        $spouse = Spouse::all();
        $property = Property::all();
        $notary = Notary::all();
        $bank = Bank::all();
        return view('archives.show', compact('archive', 'buyer', 'spouse', 'property', 'notary', 'bank'));
    }

    public function edit($id)
    {
        $archive = Archive::findOrFail($id);
        $booking = Booking::all();
        $buyer = Buyer::all();
        $spouse = Spouse::all();
        $property = Property::all();
        $notary = Notary::all();
        $bank = Bank::all();
        return view('archives.edit', compact('archive', 'booking', 'buyer', 'spouse', 'property', 'notary', 'bank'));
    }

    public function update(Request $request, $id)
    {
        $archive = Archive::findOrFail($id);

        $workOfBuyer = WorkOfBuyer::updateOrCreate(
            ['buyer_id' => $archive->booking->buyer_id],
            [
                'nama_instansi' => $request->nama_instansi,
                'alamat' => $request->alamat_instansi,
                'kota' => $request->kota_instansi,
                'status_pekerjaan' => $request->status_pekerjaan,
                'jabatan' => $request->jabatan,
                'gaji' => $request->gaji,
            ]
        );

        $arsipFields = [
            'form_biru', 'buku_biru', 'fc_ktp', 'fc_ktp_pasangan', 'fc_npwp', 'fc_kk',
            'fc_buku_nikah', 'sk_kerja', 'slip_gaji', 'form_btn', 'rek_btn'
        ];

        foreach ($arsipFields as $field) {
            $archive->$field = 0;
        }

        if ($request->has('arsip')) {
            foreach ($request->arsip as $item) {
                if (in_array($item, $arsipFields)) {
                    $archive->$item = 1;
                }
            }
        }

        $archive->save();

        return redirect()->route('archives.index')->with('success', 'Archive updated successfully.');
    }


    public function destroy($id)
    {
        $archive = Archive::findOrFail($id);
        $archive->delete();
        return redirect()->route('archives.index')->with('success', 'Archive deleted successfully.');
    }
}
