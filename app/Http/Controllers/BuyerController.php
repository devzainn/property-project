<?php

namespace App\Http\Controllers;

use App\DataTables\BuyerDataTable;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index(BuyerDataTable $dataTable)
    {
        return $dataTable->render('buyers.index');
    }

    private function convertToInternationalFormat($phone)
    {
        if (substr($phone, 0, 1) === '0') {
            return '62' . substr($phone, 1);
        }
        return $phone;
    }
}
