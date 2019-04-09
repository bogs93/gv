<?php

namespace Garro\Http\Controllers;
use Garro\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verify= Verification::all();
        return view('verifications.index', compact('verify'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verifications.create');
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
        $verify= new Role();
        $verify->date_last_verification = $request->input('date_last_verification');
        $verify->date_verification = $request->input('date_verification');     
        $verify->odometre = $request->input('odometre');              
        $verify->verication_result = $request->input('verication_result');     
        $verify->cetificate_number = $request->input('cetificate_number');     
        $verify->test_id = $request->input('test_id');               
        $verify->vehicle_id = $request->input('vehicle_id');            
        $verify->tech_id = $request->input('tech_id');               
        $verify->reject_id = $request->input('reject_id'); 
        $verify->save();
        return response()->json([
            "message" => "Verificacion Creada Correctamente.",
            "role" =>$verify
        ],200);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $verify= Verification::find($id);
        $verify->date_last_verification = $request->input('date_last_verification');
        $verify->date_verification = $request->input('date_verification');     
        $verify->odometre = $request->input('odometre');              
        $verify->verication_result = $request->input('verication_result');     
        $verify->cetificate_number = $request->input('cetificate_number');     
        $verify->test_id = $request->input('test_id');               
        $verify->vehicle_id = $request->input('vehicle_id');            
        $verify->tech_id = $request->input('tech_id');               
        $verify->reject_id = $request->input('reject_id'); 
        $verify->save();
        return response()->json([
            "message" => "Verificacion Actualizada Correctamente.",
            "role" =>$verify
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
        $verify= Role::find($id);
        $verify->delete();
    }
}
