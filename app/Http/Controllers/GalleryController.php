<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'caption' => ['nullable'],
        ]);

        return Gallery::create($data);
    }

    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => ['required'],
            'caption' => ['nullable'],
        ]);

        $gallery->update($data);

        return $gallery;
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return response()->json();
    }
}
