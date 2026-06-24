<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        return view('Backend.categoriesmanagements', compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'categories_name' => 'required',
            'image' => 'nullable|image'
        ]);


        $image = null;


        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('categories', 'public');
        }



        Categories::create([

            'categories_name' => $request->categories_name,

            'image' => $image

        ]);


        return back()->with('success', 'Category Added');
    }



    public function update(Request $request, $id)
    {

        $category = Categories::findOrFail($id);



        if ($request->hasFile('image')) {

            $category->image =
                $request->file('image')
                ->store('categories', 'public');
        }



        $category->update([

            'categories_name' => $request->categories_name

        ]);



        return back()->with('success', 'Updated');
    }



    public function destroy($id)
    {

        Categories::findOrFail($id)->delete();


        return back()->with('success', 'Deleted');
    }
}
