<?php

namespace App\Http\Controllers;

use App\Models\Street; 
use Illuminate\Http\Request;

class StreetController extends Controller
{

    public function index()
    {
        $streets = Street::all(); 
        return response()->json($streets); 
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id', 
        ]);


        $street = Street::create($validatedData);

        return response()->json($street, 201);
    }


    public function show(string $id)
    {

        $street = Street::findOrFail($id);
        return response()->json($street); 
    }


    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'city_id' => 'sometimes|required|exists:cities,id',
        ]);

        $street = Street::findOrFail($id);

        $street->update($validatedData);

        return response()->json($street);
    }


    public function destroy(string $id)
    {

        $street = Street::findOrFail($id);


        $street->delete();

        return response()->json(null, 204);
    }
}
