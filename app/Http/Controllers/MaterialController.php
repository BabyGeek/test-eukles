<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $materials = Material::orderBy('id', 'desc')
        ->paginate(40);

        return view('materials.pages.index', compact('materials'));
    }


    public function create()
    {
        return view('materials.pages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
            'max' => 'Le champ :attribute ne doit pas dépasser les :max charactères'
        ], [
            'title' => 'nom',
            'description' => 'description',
            'price' => 'prix',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $material = new Material();
        $material->title = $request->get('title');
        $material->description = $request->get('description');
        $material->price = $request->get('price');
        $material->save();

        return back()->with('success', 'Enregistrement réussi.');
    }

}
