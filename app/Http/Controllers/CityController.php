<?php

namespace App\Http\Controllers;

use App\Models\City; 
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index() {

        $cities = City::all(); 
        return response()->json($cities); 
    }

    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id', 
        ]);
       
        $city = City::create($validatedData);

        return response()->json($city, 201);
    }


    public function show(string $id) {
        
        $city = City::findOrFail($id);
        return response()->json($city); 
    }


    public function update(Request $request, string $id) {
        
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'province_id' => 'sometimes|required|exists:provinces,id',
        ]);

        
        $city = City::findOrFail($id);

        $city->update($validatedData);

        return response()->json($city);
    }


    public function destroy(string $id) {
        $city = City::findOrFail($id);

        $city->delete();

        return response()->json(null, 204);
    }
}
