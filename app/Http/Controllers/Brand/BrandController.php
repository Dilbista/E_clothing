<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('Backend.productbrand', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $request->brand_id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $brand = null;
        if ($request->filled('brand_id')) {
            $brand = Brand::findOrFail($request->brand_id);
        } else {
            $brand = new Brand();
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->origin = $request->origin;
        $brand->description = $request->description;
        $brand->status = $request->status ?? 'active';

        if ($request->hasFile('logo')) {
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                @unlink(public_path($brand->logo));
            }
            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/brands'), $logoName);
            $brand->logo = 'uploads/brands/' . $logoName;
        }

        $brand->save();

        return redirect()->back()->with('success', 'Brand saved successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            @unlink(public_path($brand->logo));
        }
        $brand->delete();
        return redirect()->back()->with('success', 'Brand deleted');
    }
}
