<?php

// app/Http/Controllers/DesignationController.php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('designations', compact('designations'));
    }

    public function create()
    {
        return view('designations_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        Designation::create($request->only('name'));

        return redirect()->route('designations')->with('success', 'Designation added successfully.');
    }

    public function edit(Designation $designation)
    {
        return view('designations_edit', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,' . $designation->id
        ]);

        $designation->update($request->only('name'));

        return redirect()->route('designations')->with('success', 'Designation updated successfully.');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('designations')->with('success', 'Designation deleted successfully.');
    }
}

