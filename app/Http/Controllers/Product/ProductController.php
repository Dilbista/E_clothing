<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // dd('ProductController index method called');
        $products = Product::with(['category', 'brand', 'sizes', 'colors'])
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        // $totalorder= Order::all();


        return view('Backend.productmanagement', compact('products', 'categories', 'brands', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
        ]);

        $product = null;
        if ($request->filled('product_id')) {
            $product = Product::findOrFail($request->product_id);
        } else {
            $product = new Product();
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }

        $product->save();

        if ($request->has('sizes')) {
            $product->sizes()->sync($request->sizes);
        } else {
            $product->sizes()->sync([]);
        }

        if ($request->has('colors')) {
            $product->colors()->sync($request->colors);
        } else {
            $product->colors()->sync([]);
        }

        return redirect()->back()->with('success', 'Product saved successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path($product->image))) {
            @unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted');
    }
}
