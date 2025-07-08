<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    public function edit(Commodity $commodity)
    {
        return view('commodities.edit', compact('commodity'));
    }

    public function update(Request $request, Commodity $commodity)
    {
        $request->validate([
            'name' => 'required|string',
            'is_service' => 'required|boolean',
        ]);

        $commodity->update($request->only('name', 'is_service'));

        return redirect()->route('goods.commodities', [
            $commodity->goodsClass->family->segment,
            $commodity->goodsClass->family,
            $commodity->goodsClass
        ])->with('success', 'Commodity updated successfully.');
    }

    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        return back()->with('success', 'Commodity deleted.');
    }
}
