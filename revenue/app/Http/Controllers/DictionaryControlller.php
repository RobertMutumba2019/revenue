<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\DictionaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;

class DictionaryControlller extends Controller
{
    public function index()
    {
        $dictionaries = Dictionary::with('category')->orderBy('d_name')->get();
        return view('dictionary', compact('dictionaries'));
    }

    public function create()
    {
        $categories = DictionaryCategory::orderBy('dc_name')->get();
        return view('dictionary_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'd_name' => 'required|string|max:255',
            'd_code' => 'required|string|max:255',
            'd_description' => 'nullable|string',
            'd_category' => 'required|exists:dictionary_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Dictionary::create([
            'd_name' => $request->d_name,
            'd_code' => $request->d_code,
            'd_description' => $request->d_description,
            'd_category' => $request->d_category,
            'd_added_by' => auth()->id(),
        ]);

        return redirect()->route('dictionaries')->with('success', 'Dictionary entry created successfully.');
    }

    public function edit(Dictionary $dictionary)
    {
        $categories = DictionaryCategory::orderBy('dc_name')->get();
        return view('dictionary_edit', compact('dictionary', 'categories'));
    }

    public function update(Request $request, Dictionary $dictionary)
    {
        $validator = Validator::make($request->all(), [
            'd_name' => 'required|string|max:255',
            'd_code' => 'required|string|max:255',
            'd_description' => 'nullable|string',
            'd_category' => 'required|exists:dictionary_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dictionary->update([
            'd_name' => $request->d_name,
            'd_code' => $request->d_code,
            'd_description' => $request->d_description,
            'd_category' => $request->d_category,
            'd_added_by' => auth()->id(),
        ]);

        return redirect()->route('dictionaries')->with('success', 'Dictionary entry updated successfully.');
    }

    public function destroy(Dictionary $dictionary)
    {
        $dictionary->delete();
        return redirect()->route('dictionaries')->with('success', 'Dictionary entry deleted successfully.');
    }

    public function import()
    {
        $categories = DictionaryCategory::orderBy('dc_name')->get();
        return view('dictionary_import', compact('categories'));
    }

    public function importStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt|max:10240', // 10MB max
            'd_category' => 'required|exists:dictionary_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader();
        if ($header[0] !== 'Name') {
            return redirect()->back()->withErrors(['file' => 'Invalid CSV template. First column must be "Name".']);
        }

        foreach ($csv as $row) {
            Dictionary::create([
                'd_name' => trim(strip_tags($row['Name'])),
                'd_description' => trim(strip_tags($row[1] ?? '')),
                'd_code' => trim(strip_tags($row[2] ?? '')),
                'd_category' => $request->d_category,
                'd_added_by' => auth()->id(),
            ]);
        }

        return redirect()->route('dictionaries')->with('success', 'Dictionary entries imported successfully.');
    }
    public function userView()
{
    $dictionaries = Dictionary::with('category')->orderBy('d_name')->get();
    return view('user_dictionaries', compact('dictionaries'));
}

}