<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\BookingLetterDataTable;
use App\Models\Bank;
use App\Models\BookingLetter;
use App\Models\Notary;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Log;

class BookingLetterController extends Controller
{
    public function index(BookingLetterDataTable $dataTable)
    {
        return $dataTable->render('bookingletters.index');
    }

    public function edit($id) {
        $bookingLetter = BookingLetter::with(['booking.buyer', 'booking.property'])->find($id);
        $notaries = Notary::all();
        $banks = Bank::all();

        if (!$bookingLetter) {
            return redirect()->route('bookings-letter.index')->with('error', 'Data not found.');
        }

        return view('bookingletters.edit', compact('bookingLetter', 'notaries', 'banks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'notaries_id' => 'required',
            'bank_id' => 'required',
            'down_payment_fee' => 'required|numeric',
            'total_price' => 'required|numeric'
        ]);

        $bookingLetter = BookingLetter::find($id);

        if (!$bookingLetter) {
            return redirect()->route('bookings-letter.index')->with('error', 'Data not found.');
        }

        $totalPrice = $bookingLetter->booking->biaya_booking + $request->down_payment_fee;

        $bookingLetter->notaries_id = $request->notaries_id;
        $bookingLetter->bank_id = $request->bank_id;
        $bookingLetter->down_payment_fee = $request->down_payment_fee;
        $bookingLetter->total_price = $totalPrice;
        $bookingLetter->save();

        return redirect()->route('bookings-letter.index')->with('success', 'Data updated successfully.');
    }

    public function preview($id)
    {
        $bookingLetter = BookingLetter::with(['booking.buyer', 'booking.property', 'notaris', 'bank'])->find($id);

        if (!$bookingLetter) {
            return redirect()->route('bookings-letter.index')->with('error', 'Data not found.');
        }

        return view('bookingletters.preview', compact('bookingLetter'));
    }

    public function print($id)
    {
        $bookingLetter = BookingLetter::with(['booking.buyer', 'booking.property', 'notaris', 'bank'])->find($id);

        if (!$bookingLetter) {
            return redirect()->route('bookings-letter.index')->with('error', 'Data not found.');
        }

        $pdf = FacadePdf::loadView('bookingletters.pdf', compact('bookingLetter'));
        return $pdf->download('surat_pemesanan_rumah.pdf');
    }

    public function destroy($id)
    {
        $bookingLetter = BookingLetter::findOrFail($id);
        $bookingLetter->delete();

        return redirect()->route('bookings-letter.index')->with('success', 'Booking deleted successfully.');
    }
}
