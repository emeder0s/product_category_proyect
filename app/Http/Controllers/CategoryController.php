<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            "results" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones
        $request->validate(['description'=> 'required']);

        //Insertamos en la base de datos
        $category = Category::create(['description'=> $request->description]);

        //devolver una respuesta
        return response()->json([
            "result"=> $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        
        return response()->json([
            "result"=> $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar
        $request->validate(['description'=>'required']);

        //actualizo la base de datos
        $category=Category::findOrFail($id);
        $category->description = $request->description;
        $category->save();

        return response()->json([
            "result"=> $category
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id)->delete();
        
        return response()->json([
            "result"=> $category
        ]);
    }
}
