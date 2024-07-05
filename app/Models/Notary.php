<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notary extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'address', 
        'no_telp', 
        'status'
    ];
}