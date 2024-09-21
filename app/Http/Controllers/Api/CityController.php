<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cities,slug',
        ]);

        $city = City::create($validatedData);

        return response()->json($city, 201);
    }

    public function destroy($id): JsonResponse
    {
        $city = City::findOrFail($id);

        $city->delete();

        return response()->json(null, 204); 
    }
}
