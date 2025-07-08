<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;
use App\Models\Family;
use App\Models\Classe;
use App\Models\Commodity;
use Illuminate\Support\Facades\Auth;

class GoodsImportController extends Controller
{
    public function showForm()
    {
        return view('goods_import_form');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $path = $request->file('file')->getRealPath();
        $file = fopen($path, 'r');

        $header = fgetcsv($file); // skip header
        $rowCount = 0;

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            $rowCount++;
            [$segmentCode, $segmentName,
             $familyCode, $familyName,
             $classCode, $className,
             $commodityCode, $commodityName,
             $isService] = array_map('trim', $row);

            // Create or get segment
            $segment = Segment::firstOrCreate(
                ['code' => $segmentCode],
                ['name' => $segmentName]
            );

            // Create or get family
            $family = Family::firstOrCreate(
                ['code' => $familyCode],
                ['name' => $familyName, 'segment_id' => $segment->id]
            );

            // Create or get class
            $class = Classe::firstOrCreate(
                ['code' => $classCode],
                ['name' => $className, 'family_id' => $family->id]
            );

            // Create or update commodity
            Commodity::updateOrCreate(
                ['code' => $commodityCode],
                [
                    'name' => $commodityName,
                    'is_service' => strtolower($isService) === 'yes',
                    'class_id' => $class->id,
                    'added_by' => Auth::id()
                ]
            );
        }

        fclose($file);

        return redirect()->back()->with('success', "Imported $rowCount records successfully.");
    }
}
