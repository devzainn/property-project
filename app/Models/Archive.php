<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'buyer_id',
        'spouse_id',
        'property_id',
        'notary_id',
        'bank_id',
        'form_biru',
        'buku_biru',
        'fc_ktp',
        'fc_ktp_pasangan',
        'fc_npwp',
        'fc_kk',
        'fc_buku_nikah',
        'sk',
        'kerja',
        'slip_gaji',
        'form_btn',
        'rek_btn',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id','buyer_id');
    }

    public function spouse()
    {
        return $this->belongsTo(Spouse::class, 'spouse_id','spouse_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id','property_id');
    }

    public function notary()
    {
        return $this->belongsTo(Notary::class, 'notary_id','notary_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id','bank_id');
    }
}
