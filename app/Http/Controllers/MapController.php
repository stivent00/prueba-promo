<?php

namespace App\Http\Controllers;

use App\Models\PuntosGps;

class MapController extends Controller
{
    public function showMap()
    {
        $puntos = PuntosGps::all();
        return view('maps', compact('puntos'));
    }
}
