<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;

class ConvertHargaToInteger extends Command
{
    protected $signature = 'convert:harga';
    protected $description = 'Convert all harga values to integers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $properties = Property::all();
        foreach ($properties as $property) {
            // Mengonversi harga menjadi integer
            $property->harga = intval($property->harga);
            $property->save();
        }
        $this->info('All harga values have been converted to integers.');
    }
}
