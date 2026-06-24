<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // dd('ddd');
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('Backend.categoriesmanagements', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:100',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = null;
        if ($request->filled('category_id')) {
            $category = Category::findOrFail($request->category_id);
        } else {
            $category = new Category();
        }

        $category->category_name = $request->category_name;

        if ($request->hasFile('category_image')) {
            // Delete old image if it exists
            if ($category->category_image && file_exists(public_path($category->category_image))) {
                @unlink(public_path($category->category_image));
            }
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('uploads/categories'), $imageName);
            $category->category_image = 'uploads/categories/' . $imageName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category saved successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->category_image && file_exists(public_path($category->category_image))) {
            @unlink(public_path($category->category_image));
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category removed');
    }
}