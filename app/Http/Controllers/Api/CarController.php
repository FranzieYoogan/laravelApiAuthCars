<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::user()->cars()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:95000',
            'image' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'description' => 'required|string|max:255',

        ]);

        $car = Auth::user()->cars()->create($validated);
        return response()->json($car,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $car = Auth::user()->cars()->findOrFail($id);
        return response()->json($car,200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $car = Auth::user()->cars()->findOrFail($id);

        $validated = $request->validate([

            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:95000',
            'image' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string|max:255',

        ]);

        $car->update($validated);
        return response()->json($car,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Auth::user()->cars()->findOrFail($id);
        $car->delete();

        return response()->json(['message' => 'deleted'],200);

    }
}
