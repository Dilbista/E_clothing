<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function index()
{
    // dd('sss');
    $brands = Brand::all();
    
    // Ensure the view name matches your file path: resources/views/Backend/productbrand.blade.php
    return view('Backend.productbrand', compact('brands'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $request->brand_id,
        ]);

        Brand::updateOrCreate(
            ['id' => $request->brand_id],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'origin' => $request->origin, // e.g., Italy, France
                'description' => $request->description,
                'status' => $request->status ?? 'active',
            ]
        );

        return redirect()->back()->with('success', 'Brand saved successfully');
    }

    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Brand deleted');
    }

}
