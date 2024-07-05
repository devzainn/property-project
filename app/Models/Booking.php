<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = "booking_id";

    protected $fillable = [
        'nama_marketing',
        'biaya_booking',
        'metode_bayar',
        'jam_booking',
        'keterangan',
        'status_pengajuan',
        'penawaran_harga',
        'buyer_id',
        'spouse_id',
        'property_id',
        'tgl_booking'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class,'buyer_id','buyer_id');
    }

    public function spouse()
    {
        return $this->belongsTo(Spouse::class,'spouse_id','spouse_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id', 'property_id');
    }

    public function bookingLetter()
    {
        return $this->hasOne(BookingLetter::class, 'booking_id', 'booking_id');
    }

    public function reportSales()
    {
        return $this->hasMany(ReportSale::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($booking) {
            $booking->bookingLetter()->delete();
            $booking->buyer()->delete();
        });
    }
}
