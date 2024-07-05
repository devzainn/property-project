<?php

namespace App\Http\Controllers;
use App\DataTables\BookingsDataTable;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Buyer;
use App\Models\Spouse;
use App\Models\Property;
use App\Models\Archive;
use App\Models\BookingLetter;
use App\Models\ReportSale;
use App\Models\WorkOfBuyer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index(BookingsDataTable $dataTable)
    {
        //$bookings = Booking::with(['buyer', 'spouse', 'property'])->orderBy('created_at', 'DESC')->get();
        //return view('bookings.index', compact('bookings'));
        return $dataTable->render('bookings.index');
    }

    public function create()
    {
        $buyer = Buyer::all();
        $spouse = Spouse::all();

        $bookedPropertyIds = Booking::pluck('property_id')->toArray();
        $property = Property::whereNotIn('property_id', $bookedPropertyIds)->get();

        return view('bookings.create', compact('buyer', 'spouse', 'property'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

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
        $spouse->nama_lengkap = $request->nama_lengkap_istri;
        $spouse->alamat = $request->alamat_istri;
        $spouse->kota = $request->kota_istri;
        $spouse->tanggal_lahir = $request->tanggal_lahir_istri;
        $spouse->nik = $request->nik_istri;
        $spouse->buyer_id = $buyer->buyer_id;
        $spouse->save();

        $booking = new Booking();
        $booking->nama_marketing = $request->nama_marketing;
        $booking->penawaran_harga = $request->penawaran_harga;
        $booking->biaya_booking = $request->biaya_booking;
        $booking->tgl_booking = $request->tgl_booking;
        $booking->jam_booking = $request->jam_booking;
        $booking->metode_bayar = $request->metode_bayar;
        $booking->status_pengajuan = $request->status_pengajuan;
        $booking->keterangan = $request->keterangan;
        $booking->buyer_id = $buyer->buyer_id;
        $booking->spouse_id = $spouse->spouse_id;
        $booking->property_id = $request->property_id;
        $booking->save();

        BookingLetter::create([
            'booking_id' => $booking->booking_id,
            'notaries_id' => null,
            'bank_id' => null,
            'down_payment_fee' => null,
            'total_fee' => null,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $buyer = Buyer::all();
        $spouse = Spouse::all();
        $property = Property::all();
        return view('bookings.show', compact('booking', 'buyer', 'spouse', 'property'));
    }

    public function edit($booking_id)
    {
        $booking = Booking::with('buyer','spouse','property')->findOrFail($booking_id);
        $buyer = Buyer::all();
        $spouse = Spouse::all();
        $property = Property::all();
        return view('bookings.edit', compact('booking', 'buyer', 'spouse', 'property'));
    }

    public function update(Request $request, $booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        $buyer = Buyer::updateOrCreate(
            ['email' => $request->email],
            [
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nik' => $request->nik,
                'npwp' => $request->npwp,
                'bpjs' => $request->bpjs,
                'no_telp' => $request->no_telp,
                'email' => $request->email
            ]
        );

        $spouse = Spouse::updateOrCreate(
            ['nik' => $request->nik_istri],
            [
                'nama_lengkap' => $request->nama_lengkap_istri,
                'alamat' => $request->alamat_istri,
                'kota' => $request->kota_istri,
                'tanggal_lahir' => $request->tanggal_lahir_istri,
                'nik' => $request->nik_istri,
                'buyer_id' => $buyer->buyer_id
            ]
        );

        $property = Property::updateOrCreate(
            ['blok' => $request->blok, 'type' => $request->type],
            [
                'blok' => $request->blok,
                'type' => $request->type,
                'luas_tanah' => $request->luas_tanah,
                'luas_bangunan' => $request->luas_bangunan,
                'harga' => $request->harga,
                'hoek' => $request->hoek
            ]
        );

        Log::info('Buyer ID: ' . $buyer->buyer_id);
        Log::info('Property ID: ' . $property->property_id);

        $booking->update([
            'nama_marketing' => $request->nama_marketing,
            'penawaran_harga' => $request->penawaran_harga,
            'biaya_booking' => $request->biaya_booking,
            'tgl_booking' => $request->tgl_booking,
            'jam_booking' => $request->jam_booking,
            'metode_bayar' => $request->metode_bayar,
            'status_pengajuan' => $request->status_pengajuan,
            'keterangan' => $request->keterangan,
            'buyer_id' => $buyer->buyer_id,
            'spouse_id' => $spouse->spouse_id,
            'property_id' => $property->property_id
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function acceptBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status_pengajuan = 'accepted';
        $booking->save();

        $reportSale = new ReportSale();
        $reportSale->booking_id = $booking->booking_id;
        $reportSale->tgl_diterima = Carbon::now()->toDateString();
        $reportSale->save();

        $bookingLetter = $booking->bookingLetter()->first();

        $archive = new Archive();
        $archive->booking_id = $booking->booking_id;
        $archive->buyer_id = $booking->buyer_id;
        $archive->spouse_id = $booking->spouse_id;
        $archive->property_id = $booking->property_id;

        $archive->notary_id = $bookingLetter->notaries_id;
        $archive->bank_id = $bookingLetter->bank_id;

        WorkOfBuyer::create([
            'buyer_id' => $booking->buyer_id,
            'nama_instansi' => null,
            'kota' => null,
            'status_pekerjaan' => null,
            'jabatan' => null,
            'gaji' => 0,
            'alamat' => null,
        ]);

        $archive->save();

        return redirect()->back()->with('success', 'Booking accepted and removed from bookings successfully.');
    }

    public function reject($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        $property = Property::findOrFail($booking->property_id);
        $property->restore();

        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking rejected and property restored successfully.');
    }
}
