<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Vehicle::where('active',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'description' => $request['description'],
            'year' => $request['year'],
            'make' => $request['make'],
            'capacity' => $request['capacity'],
            'active' => true,
            'user_id' => 1
        ]);
        return response()->json($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $vehicleResult = Vehicle::find($vehicle->id);
        return response()->json($vehicleResult);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->description = $request->description;
        $vehicle->year = $request->year;
        $vehicle->make = $request->make;
        $vehicle->capacity = $request->capacity;
        $vehicle->active = true;
        $vehicle->user_id = 1;
        $vehicle->save();
        return response()->json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->active) {
            $vehicle->update(['active' => false]);
            return response()->json('Vehiculo Desactivado Correctamente');
        }
    }

    public function restoreVehicle(Driver $vehicle)
    {
        if ($vehicle->active === false) {
            $vehicle->update(['active' => true]);
            return response()->json('info', 'Vehiculo Activado Correctamente');
        }
    }
}
