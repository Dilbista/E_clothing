<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index()
    {
        // 10 categories per page
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('Backend.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $request->category_id,
        ]);

        Category::updateOrCreate(
            ['id' => $request->category_id],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'status' => $request->status ?? 'active',
            ]
        );

        return redirect()->back()->with('success', 'Category saved successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Optional: Check if category has products before deleting
        $category->delete();
        return redirect()->back()->with('success', 'Category removed');
    }

}
