<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class StreetController extends Controller {

    public function index(Request $request) {

        $cityId = $request->query('city_id');
        if ($cityId) {
            $streets = Street::where('city_id', $cityId)->get();
        } else {
            $streets = Street::all();
        }
    
        return response()->json($streets);
    }

    public function store(Request $request) {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'city_id' => 'required|exists:cities,id',
            ]);

            $street = Street::create($validatedData);

            return response()->json($street, 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error creating street',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id) {

        try {
            $street = Street::findOrFail($id);
            return response()->json($street, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Street not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error fetching street',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id) {

        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'city_id' => 'sometimes|required|exists:cities,id',
            ]);

            $street = Street::findOrFail($id);
            $street->update($validatedData);

            return response()->json($street, 200);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Street not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error updating street',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id) {
        
        try {
            $street = Street::findOrFail($id);
            $street->delete();

            return response()->json([
                'message' => 'Street deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Street not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error deleting street',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
