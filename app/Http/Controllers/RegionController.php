<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class RegionController extends Controller
{
    public function index()
    {
        try {
            $regions = Region::all();
            return response()->json($regions);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching regions', 'details' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $region = Region::create($validatedData);

            return response()->json($region, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating region', 'details' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $region = Region::findOrFail($id);
            return response()->json($region);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Region not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching region', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
            ]);

            $region = Region::findOrFail($id);

            $region->update($validatedData);

            return response()->json($region);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Region not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating region', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $region = Region::findOrFail($id);
            $region->delete();

            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Region not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting region', 'details' => $e->getMessage()], 500);
        }
    }
}
