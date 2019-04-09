<?php

namespace Garro\Http\Controllers;
use Garro\Rejection;
use Illuminate\Http\Request;

class RejectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rejects = Rejection::all();
        return view('setting.rejects.index', compact('rejects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $rejects = new Rejection();
            $rejects->name = $request->input('name');
            $rejects->save();

            return response()->json([
                "message" => "Rechazo Creado Correctamente.",
                "rejects" =>$rejects
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
        $rejects = Rejection::find($id);
        $rejects->name = $request->input('name');
        $rejects->save();

        return response()->json([
            "message" => "Rechazo Actualizado Correctamente.",
            "rejects" =>$rejects
        ],200);
    }

    /**Reje
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rejects = Rejection::find($id);
        $rejects->delete();
    }
}
