<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display a list of departments
    public function index()
    {
        $departments = Department::all();
        return view('departments', compact('departments'));
    }

    // Show the form to create a new department
    public function create()
    {
        return view('departments_create');
    }

    // Store a new department in the database
    public function store(Request $request)
    {
        $request->validate([
            'dept_name' => 'required|unique:departments,dept_name',
        ], [
            'dept_name.required' => 'Department name is required.',
            'dept_name.unique' => 'This department name already exists.',
        ]);

        try {
            Department::create([
                'dept_name' => $request->dept_name,
            ]);

            return redirect()->route('departments')->with('success', 'Department added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Error adding department: ' . $e->getMessage())->withInput();
        }
    }

    // Show the form for editing an existing department
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments_edit', compact('department'));
    }

    // Update an existing department
    public function update(Request $request, $id)
    {
        $request->validate([
            // Ignore the current record when checking unique
            'dept_name' => 'required|unique:departments,dept_name,' . $id . ',dept_id',
        ], [
            'dept_name.required' => 'Department name is required.',
            'dept_name.unique' => 'This department name already exists.',
        ]);

        try {
            $department = Department::findOrFail($id);
            $department->update([
                'dept_name' => $request->dept_name,
            ]);

            return redirect()->route('departments')->with('success', 'Department updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Error updating department: ' . $e->getMessage())->withInput();
        }
    }

    // Delete a department
    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return redirect()->route('departments')->with('success', 'Department deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments')->withErrors('Error deleting department: ' . $e->getMessage());
        }
    }
}
