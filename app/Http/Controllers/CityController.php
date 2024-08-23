<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CityController extends Controller
{
    public function index()
    {
        try {
            $cities = City::all();
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching cities', 'details' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'province_id' => 'required|exists:provinces,id',
            ]);

            $city = City::create($validatedData);

            return response()->json($city, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating city', 'details' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $city = City::findOrFail($id);
            return response()->json($city);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'City not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching city', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'province_id' => 'sometimes|required|exists:provinces,id',
            ]);

            $city = City::findOrFail($id);

            $city->update($validatedData);

            return response()->json($city);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'City not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating city', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'City not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting city', 'details' => $e->getMessage()], 500);
        }
    }
}
