<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;
    protected $primaryKey = "spouse_id";


    protected $fillable = [
        'buyer_id',
        'nama_lengkap',
        'alamat',
        'kota',
        'tanggal_lahir',
        'nik',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
