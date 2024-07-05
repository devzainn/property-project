<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLetter extends Model
{
    use HasFactory;

    protected $table = 'booking_letters';

    protected $fillable = [
        'booking_id',
        'notaries_id',
        'bank_id',
        'down_payment_fee',
        'total_price',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function notaris()
    {
        return $this->belongsTo(Notary::class, 'notaries_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
