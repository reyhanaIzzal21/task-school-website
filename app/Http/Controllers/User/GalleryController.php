<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(6);
        return view('user.pages.galleries.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('images', 'user');
        return view('user.pages.galleries.show', compact('gallery'));
    }
}
