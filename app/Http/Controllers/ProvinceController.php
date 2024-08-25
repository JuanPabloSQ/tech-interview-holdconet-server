<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ProvinceController extends Controller {

    public function index(Request $request) {

        $regionId = $request->query('region_id'); 
        if ($regionId) {
            $provinces = Province::where('region_id', $regionId)->get();
        } else {
            $provinces = Province::all();
        }
    
        return response()->json($provinces);
    }

    public function store(Request $request) {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'region_id' => 'required|exists:regions,id',
            ]);

            $province = Province::create($validatedData);

            return response()->json($province, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating province', 'details' => $e->getMessage()], 500);
        }
    }

    public function show(string $id) {
        
        try {
            $province = Province::findOrFail($id);
            return response()->json($province);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Province not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching province', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, string $id) {

        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'region_id' => 'sometimes|required|exists:regions,id',
            ]);

            $province = Province::findOrFail($id);

            $province->update($validatedData);

            return response()->json($province);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Province not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating province', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id) {
        
        try {
            $province = Province::findOrFail($id);
            $province->delete();

            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Province not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting province', 'details' => $e->getMessage()], 500);
        }
    }
}
