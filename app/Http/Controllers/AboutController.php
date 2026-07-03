<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display the About page.
     */
    public function index()
    {
        $abouts = About::latest()->get();

        return view('Backend.about', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
        }

        About::create([
            'name'        => $request->name,
            'position'    => $request->position,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('about.index')
            ->with('success', 'About information added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $about->image;

        if ($request->hasFile('image')) {

            if ($about->image && File::exists(public_path('uploads/about/' . $about->image))) {
                File::delete(public_path('uploads/about/' . $about->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
        }

        $about->update([
            'name'        => $request->name,
            'position'    => $request->position,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('about.index')
            ->with('success', 'About information updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(About $about)
    {
        if ($about->image && File::exists(public_path('uploads/about/' . $about->image))) {
            File::delete(public_path('uploads/about/' . $about->image));
        }

        $about->delete();

        return redirect()->route('about.index')
            ->with('success', 'About information deleted successfully.');
    }
}