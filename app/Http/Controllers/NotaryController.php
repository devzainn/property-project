<?php

namespace App\Http\Controllers;
use App\DataTables\NotariesDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Notary;
use Illuminate\Http\Request;

class NotaryController extends Controller
{
    public function index(NotariesDataTable $dataTable)
    {
        //$notaries = Notary::all();
        //return view('notaries.index', compact('notaries'));
        return $dataTable->render('notaries.index');
    }

    public function create()
    {
        return view('notaries.create');
    }

    public function store(Request $request)
    {
        Notary::create($request->all());

        return redirect()->route('notaries.index')->with('success', 'Notaris berhasil ditambahkan');
    }

    public function edit($id)
    {
        $notary = Notary::findOrFail($id);
        return view('notaries.edit', compact('notary'));
    }

    public function update(Request $request, $id)
    {
        
        $notary = Notary::findOrFail($id);
        $notary->update($request->all());

        return redirect()->route('notaries.index')->with('success', 'Notaris berhasil diperbarui');
    }

    public function destroy($id)
    {
        $notary = Notary::findOrFail($id);
        $notary->delete();

        return redirect()->route('notaries.index')->with('success', 'Notaris berhasil dihapus');
    }
}
