<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Vehicle;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = User::where('role_id', '=', '2')
            ->select('users.email','users.id','users.name')
            ->get();
        if ($request->ajax()) {
            return response()->json($customers,200);
        }else{
             return view('companies.index', compact('customers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make('12345678');
            $user->role_id = 2;
            $user->save();

            $company = new Company();
            $company->rfc = $request->input('rfc');
            $company->cellphone = $request->input('cellphone');
            $company->contact = $request->input('contact');
            $company->address = $request->input('address');
            $company->municipality = $request->input('municipality');
            $company->state = $request->input('state');
            $company->cp = $request->input('cp');
            $company->user_id = $user->id;
            $company->save();

            return response()->json([
                "message" => "Usuario Creado Correctamente.",
                "user" =>$company
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
        $customer = User::select('companies.*','users.email','users.id','users.name')
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->find($id);
        return view('companies.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::select('companies.*','companies.id as company_id','users.email','users.id','users.name')
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->find($id);
        return view('companies.edit',compact('customer'));
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

        $user = User::find($request->input('user_id'));
        $user->email=$request->input('email');
        $user->name=$request->input('name');
        $user->save();

        $company = Company::find($request->input('company_id'));
        $company->rfc = $request->input('rfc');
        $company->cellphone = $request->input('cellphone');
        $company->contact = $request->input('contact');
        $company->address = $request->input('address');
        $company->municipality = $request->input('municipality');
        $company->state = $request->input('state');
        $company->cp = $request->input('cp');
        $company->save();

        return response()->json([
            "message" => "Cliente Actualizado Correctamente.",
            "Company" =>$company
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
        $vehicle = Vehicle::where('user_id', '=', $id)
            ->delete();

        $company = Company::where('user_id', '=', $id)
            ->delete();

        $user = User::find($id)
            ->delete();

        return response()->json([
            "message" => "Cliente y Vehiculos Eliminados.",
            "id" => $id,
            "vehicle" =>$vehicle,
            "company" =>$company,
            "user" =>$user
        ],200);
    }
}
