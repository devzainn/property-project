<?php

namespace App\Http\Controllers;

use App\Models\SitePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SitePlanController extends Controller
{
    public function index()
    {
        $siteplans = SitePlan::orderBy('created_at', 'DESC')->get();
        $latestSitePlan = SitePlan::latest()->first();
        return view('site_plans.index', compact('siteplans','latestSitePlan'));
    }

    public function create()
    {
        return view('site_plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'location', 'status', 'description']);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('site_plans', 'public');
            $data['file_path'] = $filePath;
        }

        SitePlan::create($data);

        return redirect()->route('site_plans.index')->with('success', 'Site Plan added successfully');
    }

    public function show($id)
    {
        $siteplans = SitePlan::findOrFail($id);
        return view('site_plans.show', compact('siteplans'));
    }

    public function edit($id)
    {
        $siteplans = SitePlan::findOrFail($id);
        return view('site_plans.edit', compact('siteplans'));
    }

    public function update(Request $request, $id)
    {
        $siteplans = SitePlan::findOrFail($id);
        $data = $request->only(['name', 'location', 'status', 'description']);
        if ($request->hasFile('file')) {
            if ($siteplans->file_path) {
                Storage::delete('public/' . $siteplans->file_path);
            }
            $filePath = $request->file('file')->store('site_plans', 'public');
            $data['file_path'] = $filePath;
        }

        $siteplans->update($data);

        return redirect()->route('site_plans.index')->with('success', 'Site Plan updated successfully');
    }

    public function destroy($id)
    {
        $siteplans = SitePlan::findOrFail($id);

        if ($siteplans->file_path) {
            Storage::delete('public/' . $siteplans->file_path);
        }

        $siteplans->delete();

        return redirect()->route('site_plans.index')->with('success', 'Site Plan deleted successfully');
    }
}
