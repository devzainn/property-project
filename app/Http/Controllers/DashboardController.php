<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $propertyCount = Property::count();

        // $saleCount = Sale::count();
        return view('dashboard', compact('propertyCount'));
    }
}
