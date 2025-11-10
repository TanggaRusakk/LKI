<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $woods = Wood::latest()->paginate(10);
        return view('admin.woods.index', compact('woods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.woods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'origin' => 'required|in:Indonesia,other',
            'other_origin' => 'nullable|required_if:origin,other|string|max:255',
            'description' => 'required|string',
            'characteristics' => 'required|string',
            'uses' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle origin: if 'other', use the specified other_origin
        if ($validated['origin'] === 'other') {
            $validated['origin'] = $validated['other_origin'];
            unset($validated['other_origin']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/wood'), $imageName);
            $validated['image'] = 'images/wood/' . $imageName;
        }

        Wood::create($validated);

        return redirect()->route('admin.woods.index')->with('success', 'Wood created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wood $wood)
    {
        return view('admin.woods.show', compact('wood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wood $wood)
    {
        return view('admin.woods.edit', compact('wood'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wood $wood)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'origin' => 'required|in:Indonesia,other',
            'other_origin' => 'nullable|required_if:origin,other|string|max:255',
            'description' => 'required|string',
            'characteristics' => 'required|string',
            'uses' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle origin: if 'other', use the specified other_origin
        if ($validated['origin'] === 'other') {
            $validated['origin'] = $validated['other_origin'];
            unset($validated['other_origin']);
        }

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($wood->image && file_exists(public_path($wood->image))) {
                unlink(public_path($wood->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/wood'), $imageName);
            $validated['image'] = 'images/wood/' . $imageName;
        }

        $wood->update($validated);

        return redirect()->route('admin.woods.index')->with('success', 'Wood updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wood $wood)
    {
        // Delete image file if exists
        if ($wood->image && file_exists(public_path($wood->image))) {
            unlink(public_path($wood->image));
        }

        $wood->delete();

        return redirect()->route('admin.woods.index')->with('success', 'Wood deleted successfully!');
    }
}
