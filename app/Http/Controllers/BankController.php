<?php

namespace App\Http\Controllers;
use App\DataTables\BanksDataTable;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{


    public function index(BanksDataTable $dataTable)
    {
        //$banks = Bank::all();
        //return view('banks.index', compact('banks'));
        return $dataTable->render('banks.index');

    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        Bank::create($request->all());

        return redirect()->route('banks.index')->with('success', 'Data bank berhasil disimpan.');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('banks.edit', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $bank = Bank::findOrFail($id);
        $bank->update($request->all());

        return redirect()->route('banks.index')->with('success', 'Data bank berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('banks.index')->with('success', 'Data bank berhasil dihapus.');
    }
}
