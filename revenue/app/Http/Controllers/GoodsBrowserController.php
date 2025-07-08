<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Models\Family;
use App\Models\Classe;
use App\Models\Commodity;

class GoodsBrowserController extends Controller
{
    public function index()
    {
        $segments = Segment::orderBy('code')->get();
        return view('goods.index', compact('segments'));
    }

    public function showFamilies(Segment $segment)
    {
        $families = $segment->families()->orderBy('code')->get();
        return view('goods.families', compact('segment', 'families'));
    }

    public function showClasses(Segment $segment, Family $family)
    {
        $classes = $family->classes()->orderBy('code')->get();
        return view('goods.classes', compact('segment', 'family', 'classes'));
    }

    public function showCommodities(Segment $segment, Family $family, Classe $class)
    {
        $commodities = $class->commodities()->orderBy('code')->get();
        return view('goods.commodities', compact('segment', 'family', 'class', 'commodities'));
    }
}
