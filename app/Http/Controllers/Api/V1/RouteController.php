<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Route;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $routes = DB::table('routes')
            ->leftJoin('drivers', 'routes.driver_id','=', 'drivers.id')
            ->leftJoin('vehicles', 'routes.vehicle_id', '=', 'vehicles.id')
            ->select('routes.*', 'drivers.first_name', 'drivers.last_name', 'vehicles.description as vehiculo')
            ->get();
            return response()->json($routes);
        } catch (Exception $e) {
            log::warning('Error al recibir la ruta');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRouteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteRequest $request)
    {
        $route = Route::create([
            'driver_id' => $request['driver_id'],
            'vehicle_id' => $request['vehicle_id'],
            'description' => $request['description'],
            'active' => true,
            'user_id' => 1
        ]);
        return response()->json($route);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        $routeResult = DB::table('routes')
            ->leftJoin('drivers', 'routes.driver_id','=', 'drivers.id')
            ->leftJoin('vehicles', 'routes.vehicle_id', '=', 'vehicles.id')
            ->select('routes.*', 'drivers.first_name', 'drivers.last_name', 'vehicles.description as vehiculo')
            ->where('routes.id','=', $route->id)
            ->get();
        return response()->json($routeResult);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        $routeResult = DB::table('routes')
            ->leftJoin('drivers', 'routes.driver_id','=', 'drivers.id')
            ->leftJoin('vehicles', 'routes.vehicle_id', '=', 'vehicles.id')
            ->select('routes.*', 'drivers.first_name', 'drivers.last_name', 'vehicles.description as vehiculo')
            ->where('route.id','=', $route->id)
            ->get();
        return response()->json($routeResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRouteRequest  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRouteRequest $request, Route $route)
    {
        $route->driver_id = $request->driver_id;
        $route->vehicle_id = $request->vehicle_id;
        $route->description = $request->description;
        $route->active = true;
        $route->user_id = 1;
        $route->save();
        return response()->json($route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        if ($route->active) {
            $route->update(['active' => false]);
            return response()->json('Ruta Desactivada Correctamente');
        }
    }

    public function restoreRoute(Route $route)
    {
        if ($route->active === false) {
            $route->update(['active' => true]);
            return response()->json('info', 'Ruta Activada Correctamente');
        }
    }
}
