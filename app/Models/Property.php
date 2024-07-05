<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $primaryKey = 'property_id';

    protected $fillable = [
        'blok',
        'type',
        'luas_tanah',
        'luas_bangunan',
        'hoek',
        'harga',
        'keterangan',
        'hgb_induk',
        'hgb_pecahan',
        'imb_induk',
        'imb_pecahan'
    ];}
