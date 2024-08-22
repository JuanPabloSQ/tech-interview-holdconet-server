<?php

namespace App\Http\Controllers;

use App\Models\Region; 
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all(); 

        return response()->json($regions); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region = Region::create($validatedData);

        return response()->json($region, 201);
    }

    public function show(string $id)
    {
        $region = Region::findOrFail($id);
        return response()->json($region); 
    }


    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $region = Region::findOrFail($id);

        $region->update($validatedData);

        return response()->json($region);
    }


    public function destroy(string $id)
    {
        
        $region = Region::findOrFail($id);

        $region->delete();

        return response()->json(null, 204);
    }
}
