<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSale extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'tgl_diterima'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
