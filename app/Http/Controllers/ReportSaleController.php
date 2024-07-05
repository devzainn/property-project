<?php

namespace App\Http\Controllers;

use App\DataTables\ReportSaleDataTable;
use Illuminate\Http\Request;

class ReportSaleController extends Controller
{
    public function index(ReportSaleDataTable $dataTable)
    {
        return $dataTable->render('report_sales.index');
    }
}
