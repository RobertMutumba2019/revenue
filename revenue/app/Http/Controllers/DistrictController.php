<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{
    // List all districts
    public function allDistricts()
    {
        $districts = District::with('addedBy')->orderBy('district_name')->get();
        return view('districts', compact('districts'));
    }

    // Show form to add a district
    public function addDistrict()
    {
        return view('districts_add');
    }

    // Store new district
    public function storeDistrict(Request $request)
    {
        $request->validate([
            'district_name' => 'required|string|unique:districts,district_name',
            'district_code' => 'required|string|unique:districts,district_code',
        ]);

        District::create([
            'district_name' => $request->district_name,
            'district_code' => $request->district_code,
            'district_date_added' => now(),
            'district_added_by' => Session::get('user_id') ?? 1,
        ]);

        return redirect()->route('districts_all')->with('success', 'District added successfully.');
    }

    // Show form to edit a district
    public function editDistrict($id)
    {
        $district = District::findOrFail($id);
        return view('districts_edit', compact('district'));
    }

    // Update an existing district
    public function updateDistrict(Request $request, $id)
    {
        $district = District::findOrFail($id);

        $request->validate([
            'district_name' => 'required|string|unique:districts,district_name,' . $id,
            'district_code' => 'required|string|unique:districts,district_code,' . $id,
        ]);

        $district->update([
            'district_name' => $request->district_name,
            'district_code' => $request->district_code,
            'district_date_added' => now(),
            'district_added_by' => Session::get('user_id') ?? 1,
        ]);

        return redirect()->route('districts_all')->with('success', 'District updated successfully.');
    }

    // Delete a district
    public function deleteDistrict($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('districts_all')->with('success', 'District deleted successfully.');
    }
}
