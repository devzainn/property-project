<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOfBuyer extends Model
{
    use HasFactory;

    protected $table = 'work_of_buyer';

    protected $fillable = [
        'nama_instansi',
        'alamat',
        'kota',
        'status_pekerjaan',
        'jabatan',
        'gaji',
        'buyer_id'
    ];
}
