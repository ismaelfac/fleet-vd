<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Driver;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use Log;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Driver::where('active',1)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'ssn' => $request['ssn'],
            'dob' => $request['dob'],
            'address' => $request['address'],
            'city' => $request['city'],
            'zip' => $request['zip'],
            'phone' => $request['phone'],
            'active' => true,
            'user_id' => 1
        ]);
        return response()->json($driver);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        $driverResult = Driver::find($driver->id);
        return response()->json($driverResult);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverRequest  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->ssn = $request->ssn;
        $driver->dob = $request->dob;
        $driver->address = $request->address;
        $driver->city = $request->city;
        $driver->zip = $request->zip;
        $driver->phone = $request->phone;
        $driver->active = true;
        $driver->user_id = 1;
        $driver->save();
        return response()->json($driver);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        if ($driver->active) {
            $driver->update(['active' => false]);
            return response()->json('Conductor Desactivado Correctamente');
        }
    }

    public function restoreDrive(Driver $driver)
    {
        if ($driver->active === false) {
            $driver->update(['active' => true]);
            return response()->json('Conductor Activado Correctamente');
        }
    }
}
