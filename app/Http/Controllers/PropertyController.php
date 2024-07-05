<?php

namespace App\Http\Controllers;
use App\DataTables\PropertiesDataTable;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(PropertiesDataTable $dataTable)
    {
        //$property = Property::orderBy('created_at', 'DESC')->get();
        //return view('properties.index', compact('property'));
        return $dataTable->render('properties.index');

    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        
        Property::create($request->all());

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show($property_id)
    {
        $property = Property::where('property_id', $property_id)->firstOrFail();
        return view('properties.show', compact('property'));
    }

    public function edit($property_id)
    {
        $property = Property::where('property_id', $property_id)->firstOrFail(); 
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, $property_id)
    {
        $property = Property::where('property_id', $property_id)->firstOrFail();
        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($property_id)
    {
        $property = Property::where('property_id', $property_id)->firstOrFail();
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
