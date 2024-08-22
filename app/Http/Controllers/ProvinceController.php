<?php

namespace App\Http\Controllers;

use App\Models\Province; 
use Illuminate\Http\Request;

class ProvinceController extends Controller {

    public function index() {

        $provinces = Province::all(); 
        return response()->json($provinces); 
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id', 
        ]);

        $province = Province::create($validatedData);

        return response()->json($province, 201);
    }

    public function show(string $id) {

        $province = Province::findOrFail($id);
        return response()->json($province); 
    }


    public function update(Request $request, string $id) {
       
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'region_id' => 'sometimes|required|exists:regions,id',
        ]);

        $province = Province::findOrFail($id);

        $province->update($validatedData);

        return response()->json($province);
    }

    public function destroy(string $id) {

        $province = Province::findOrFail($id);


        $province->delete();

        return response()->json(null, 204);
    }
}
