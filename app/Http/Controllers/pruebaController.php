<?php

namespace App\Http\Controllers;

use App\Helpers\AlgorithmHelper\AlgorithmHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pruebaController extends Controller
{

    public function prueba()
    {
        return 'estoy dentro del controlador';
    }
    public function algorithm(Request $request)
    {
        $plate = $request->input('plate');
        return response()->json(AlgorithmHelper::resolve($plate));
    }
}
