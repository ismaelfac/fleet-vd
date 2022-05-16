<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Scheduler;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchedulerRequest;
use App\Http\Requests\UpdateSchedulerRequest;
use Illuminate\Support\Facades\DB;

class SchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduler = DB::table('schedulers')
            ->leftJoin('routes', 'schedulers.route_id','=', 'routes.id')
            ->select('schedulers.*', 'routes.description as ruta')
            ->where('schedulers.active','=',true)
            ->get();
        return response()->json($scheduler);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSchedulerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchedulerRequest $request)
    {
        $scheduler = scheduler::create([
            'route_id' => $request['route_id'],
            'week_num' => $request['week_num'],
            'from' => $request['from'],
            'to' => $request['to'],
            'active' => true,
            'user_id' => 1
        ]);
        return response()->json($scheduler);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function show(Scheduler $scheduler)
    {
        $schedulerResult = DB::table('schedulers')
            ->leftJoin('routes', 'schedulers.route_id','=', 'routes.id')
            ->select('schedulers.*', 'routes.description as ruta')
            ->where('schedulers.id','=',$scheduler->id)
            ->get();
        return response()->json($schedulerResult);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(Scheduler $scheduler)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSchedulerRequest  $request
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchedulerRequest $request, Scheduler $scheduler)
    {
        $scheduler->route_id = $request->route_id;
        $scheduler->week_num = $request->week_num;
        $scheduler->from = $request->from;
        $scheduler->to = $request->to;
        $scheduler->active = true;
        $scheduler->user_id = 1;
        $scheduler->save();
        return response()->json($scheduler);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduler $scheduler)
    {
        if ($scheduler->active) {
            $scheduler->update(['active' => false]);
            return response()->json('Programaciòn Desactivada Correctamente');
        }
    }

    public function restoreScheduler(Driver $scheduler)
    {
        if ($scheduler->active === false) {
            $scheduler->update(['active' => true]);
            return response()->json('info', 'Programacion Activada Correctamente');
        }
    }
}
