<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $primaryKey = "buyer_id";

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'kota',
        'tanggal_lahir',
        'nik',
        'npwp',
        'bpjs',
        'no_telp',
        'email',
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(WorkOfBuyer::class,'buyer_id','buyer_id');
    }
}
