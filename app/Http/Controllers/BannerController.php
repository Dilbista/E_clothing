<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
     public function index()
    {
        return view('Backend.banners.index'); 
    }

    // Appends the absolute storage path to the image property
   public function data()
{
    // The appended 'image_url' property is automatically present in the JSON serialization now
    $banners = Banner::orderBy('order', 'asc')->get();
    return response()->json($banners);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048', // 2MB Max
            'position' => 'required|string|in:Homepage,Collection,Product Page',
            'order' => 'nullable|integer',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $validated['image'] = $path;
        }

        if (!isset($validated['order'])) {
            $validated['order'] = Banner::max('order') + 1;
        }

        $banner = Banner::create($validated);
        $banner->image_url = asset('storage/' . $banner->image);

        return response()->json([
            'message' => 'Banner added successfully',
            'banner' => $banner
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048', // Nullable on update
            'position' => 'required|string|in:Homepage,Collection,Product Page',
            'order' => 'required|integer',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            // Remove old file to prevent storage bloat
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $path = $request->file('image')->store('banners', 'public');
            $validated['image'] = $path;
        } else {
            // Retain old image path if none uploaded
            unset($validated['image']);
        }

        $banner->update($validated);
        $banner->image_url = asset('storage/' . $banner->image);

        return response()->json([
            'message' => 'Banner updated successfully',
            'banner' => $banner
        ]);
    }

    public function reorder(Request $request, Banner $banner)
    {
        $request->validate([
            'direction' => 'required|in:up,down'
        ]);

        $direction = $request->input('direction');

        if ($direction === 'up') {
            $adjacent = Banner::where('order', '<', $banner->order)
                ->orderBy('order', 'desc')
                ->first();
        } else {
            $adjacent = Banner::where('order', '>', $banner->order)
                ->orderBy('order', 'asc')
                ->first();
        }

        if ($adjacent) {
            $tempOrder = $banner->order;
            $banner->order = $adjacent->order;
            $adjacent->order = $tempOrder;

            $banner->save();
            $adjacent->save();

            return response()->json([
                'message' => 'Banner reordered successfully'
            ]);
        }

        return response()->json([
            'message' => 'Banner is already at the limit boundary.'
        ], 400);
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        
        $banner->delete();

        return response()->json([
            'message' => 'Banner deleted successfully'
        ]);
    }
}
