<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        $trash_count = Dish::onlyTrashed()
            ->count();


        return view('admin.dishes.index', compact('trash_count', 'dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|file',
                'ingredients' => 'required|string',
                'description' => 'nullable|string',
            ],
            [
                'name.required' => 'Il campo Nome è obbligatorio',
                'name.string' => 'Il campo Nome deve essere una stringa',
                'price.required' => 'Il campo Prezzo è obbligatorio',
                'price.numeric' => 'Il campo Prezzo deve essere un numero',
                'image.file' => 'Immagine non valida',
                'ingredients.required' => 'Il campo Ingredienti è obbligatorio',
                'ingredients.string' => 'Il campo Ingredienti deve essere una stringa',
                'description.string' => 'Il campo Descrizione deve essere una stringa',
            ]
        );

        $data = $request->all();

        if (array_key_exists('image', $data)) {
            $image_url = Storage::disk('public')->put('plate_images', $data['image']);
            $data['image'] = $image_url;
        } else {
            $data['image'] = 'placeholder.jpg';
        }

        $dish = new Dish();
        $dish->fill($data);
        $dish->save();

        return redirect()->route('admin.dishes.show', $dish->id)->with('toast-message', 'Piatto creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dish = Dish::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|file',
            'ingredients' => 'required|string',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Il campo Nome è obbligatorio',
            'name.string' => 'Il campo Nome deve essere una stringa',
            'price.required' => 'Il campo Prezzo è obbligatorio',
            'price.numeric' => 'Il campo Prezzo deve essere un numero',
            'image.file' => 'Immagine non valida',
            'ingredients.required' => 'Il campo Ingredienti è obbligatorio',
            'ingredients.string' => 'Il campo Ingredienti deve essere una stringa',
            'description.string' => 'Il campo Descrizione deve essere una stringa',
        ]);

        $data = $request->all();

        $currentImage = $request->input('current_image');

        if (array_key_exists('image', $data)) {
            $image_url = Storage::disk('public')->put('plate_images', $data['image']);
            $data['image'] = $image_url;
        } else {
            $data['image'] = $currentImage;
        }
        if (isset($dish->is_visible) || $dish->is_visible != '1') {
            $dish->is_visible = 0;
        };


        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish->id)->with('toast-message', 'Piatto aggiornato con successo');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('admin.dishes.index')->with('toast-message', 'Piatto eliminato con successo');
    }

    public function trash()
    {
        $dishes = Dish::onlyTrashed()->get();

        return view('admin.dishes.trash', compact('dishes'));
    }
    public function dropAll()
    {
        Dish::onlyTrashed()->forceDelete();

        return redirect()->route('admin.dishes.trash');
    }

    public function drop(string $id)
    {
        $dish = Dish::onlyTrashed()->findOrFail($id);
        $dish->forceDelete();

        return redirect()->route('admin.dishes.trash');
    }

    public function restore(string $id)
    {
        $dish = Dish::onlyTrashed()->findOrFail($id);
        $dish->restore();

        return redirect()->route('admin.dishes.trash')->with('toast-message', 'Piatto ripristinato con successo');
    }
}
