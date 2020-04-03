<?php

namespace App\Http\Controllers;
use App\Helpers\AlgorithmHelper\AlgorithmHelper;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::all();
        return view('vehicles.index', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $vehicle = new Vehicle();
            $vehicle->brand = $request->input('brand');
            $vehicle->model = $request->input('model');
            $vehicle->series = $request->input('series');
            $vehicle->plate_number = $request->input('plate_number');
            $vehicle->folio_circulation = $request->input('folio_circulation');
            $vehicle->capacity = $request->input('capacity');
            $vehicle->axes_id = $request->input('axes_id');
            $vehicle->engine_id = $request->input('engine_id');
            $vehicle->service_id = $request->input('service_id');
            $vehicle->user_id = $request->input('user_id');
            $vehicle->save();

            return response()->json([
                "message" => "Vehiculo Creado Correctamente.",
                "vehicle" =>$vehicle
            ],200);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show',compact('vehicle'));
/*
        if ($request->ajax()) {
            return response()->json($vehicle,200);
        }else{
            return view('vehicles.show',compact('vehicle'));
        } */


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->brand = $request->input('brand');
        $vehicle->model = $request->input('model');
        $vehicle->series = $request->input('series');
        $vehicle->plate_number = $request->input('plate_number');
        $vehicle->folio_circulation = $request->input('folio_circulation');
        $vehicle->capacity = $request->input('capacity');
        $vehicle->axes_id = $request->input('axes_id');
        $vehicle->engine_id = $request->input('engine_id');
        $vehicle->service_id = $request->input('service_id');
        $vehicle->user_id = $request->input('user_id');
        $vehicle->save();

        return response()->json([
            "message" => "Vehiculo Actualizado Correctamente.",
            "vehicle" =>$vehicle
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
    }
    public function showVehicles($id)
    {
        //$vehicle = Vehicle::find($id);
        $vehicle = DB::table('vehicles')
                    ->where('user_id', '=', $id)
                    ->join('users', 'vehicles.user_id', '=', 'users.id')
                    ->select('vehicles.*','users.name')
                    ->get();
        return view('vehicles.index',compact('vehicle'));
/*
        if ($request->ajax()) {
            return response()->json($vehicle,200);
        }else{
            return view('vehicles.show',compact('vehicle'));
        } */
    }
    public function addVehicle($id)
    {
            return view('vehicles.create',compact('id'));
    }

    public function getValidationMonths(Request $request){
        $intMonth = $request->input('month');
        $month = AlgorithmHelper::numToMonth($intMonth);
        $algorithmResponse = [];
        $vehicles = Vehicle::all();
        foreach($vehicles as $vehicle){
            $d = ['record' => $vehicle, 'algorithm' => $vehicle->validationMonths()];
            array_push($algorithmResponse, $d);
        }
        $response = collect($algorithmResponse)->filter(function ($r) use($month){
            return in_array($month, $r['algorithm']['validationMonths']);
        });
        return response()->json($response,200);
    }
}
