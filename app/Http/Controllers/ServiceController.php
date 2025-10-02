<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'seo_keywords' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        $slug = Str::slug($request->title);
        $count = Service::where('slug', $slug)->count();
        $data['slug'] = $count ? $slug . '-' . ($count + 1) : $slug;


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'seo_keywords' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
        ]);

        $service = Service::findOrFail($id);
        $data = $request->all();

        if ($service->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Service::where('slug', $slug)->where('id', '!=', $id)->count();
            $data['slug'] = $count ? $slug . '-' . ($count + 1) : $slug;
        } else {
            $data['slug'] = $service->slug;
        }

        if ($request->hasFile('image')) {
            if($service->image){
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        } else {
            $data['image'] = $service->image;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        if($service->image){
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
