<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $selectedCity = $request->session()->get('selected_city', null);
        if ($selectedCity) {
            return redirect()->route('city.show', ['slug' => $selectedCity->slug]);
        }

        return view('index', [
            'cities' => City::all(),
        ]);
    }

    public function show($slug, Request $request)
    {
        $selectedCity = City::where('slug', $slug)->firstOrFail();
        $request->session()->put('selected_city', $selectedCity);

        return view('city', [
            'selectedCity' => $selectedCity,
            'cities' => City::all(),
        ]);
    }

    public function about($slug, Request $request)
    {
        $selectedCity = City::where('slug', $slug)->firstOrFail();
        return view('about', [
            'cities' => City::all(),
            'selectedCity' => $selectedCity,
        ]);
    }

    public function news($slug, Request $request)
    {
        $selectedCity = City::where('slug', $slug)->firstOrFail();
        return view('news', [
            'cities' => City::all(),
            'selectedCity' => $selectedCity,
        ]);
    }
}
