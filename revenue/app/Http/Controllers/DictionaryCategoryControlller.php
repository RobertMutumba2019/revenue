<?php

namespace App\Http\Controllers;

use App\Models\DictionaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DictionaryCategoryControlller extends Controller
{
    public function index()
    {
        $categories = DictionaryCategory::orderBy('dc_name')->get();
        return view('category', compact('categories'));
    }

    public function create()
    {
        return view('category_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dc_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DictionaryCategory::create([
            'dc_name' => $request->dc_name,
            'dc_added_by' => auth()->id(),
        ]);

        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }

    public function edit(DictionaryCategory $category)
    {
        return view('category_edit', compact('category'));
    }

    public function update(Request $request, DictionaryCategory $category)
    {
        $validator = Validator::make($request->all(), [
            'dc_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update([
            'dc_name' => $request->dc_name,
            'dc_added_by' => auth()->id(),
        ]);

        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(DictionaryCategory $category)
    {
        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}