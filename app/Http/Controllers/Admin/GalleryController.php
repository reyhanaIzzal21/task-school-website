<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('images', 'user')->latest()->paginate(10);
        return view('admin.pages.galleries.index', compact('galleries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGalleryRequest $request)
    {
        $validated = $request->validated();

        // buat gallery (save minimal data)
        $gallery = Gallery::create([
            'title' => $validated['title'],
            'image' => null,
            'user_id' => Auth::id(),
        ]);

        // simpan setiap file images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('galleries', 'public');
                $gallery->images()->create([
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('images', 'user');
        return view('admin.pages.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        return view('admin.pages.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $validated = $request->validated();

        $gallery->title = $validated['title'];
        $gallery->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('galleries', 'public');
                $gallery->images()->create([
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $image) {
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil dihapus.');
    }

    /**
     * Hapus satu gambar dari gallery (route terpisah)
     */

    public function destroyImage(Request $request, GalleryImage $galleryImage)
    {
        if ($galleryImage->image && Storage::disk('public')->exists($galleryImage->image)) {
            Storage::disk('public')->delete($galleryImage->image);
        }

        $galleryImage->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus.']);
        }

        // fallback untuk request normal
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
