<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;

class VehicleController extends Controller
{
public function index()
{
    $vehicles = Vehicle::all();
    return view('vehicles.index', compact('vehicles'));
}

public function store(Request $request)
{
    $request->validate([
        'license_plate' => 'required|unique:vehicles',
        'model' => 'required',
    ]);
    Vehicle::create($request->all());
    return redirect()->route('vehicles.index');
}
}
