<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::all();
        return view('admin.pictures.index', compact('pictures'));
    }

    public function create()
    {
        return view('admin.pictures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('filename')) {
            $image_url = Storage::disk('public')->put('pictures', $request->file('filename'));
            $data['filename'] = $image_url;
        } else {
            $data['filename'] = 'placeholder.jpg';
        }

        $picture = new Picture();
        $picture->fill($data);
        $picture->save();

        return redirect()->route('admin.pictures.index');
    }

    public function drop(string $id)
    {
        $picture = Picture::findOrFail($id);
        $picture->forceDelete();
        return redirect()->route('admin.pictures.index');
    }
}
