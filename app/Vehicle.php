<?php

namespace App;

use App\Helpers\AlgorithmHelper\AlgorithmHelper;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    public function validationMonths(){
        return AlgorithmHelper::resolve($this->plate_number);
    }
}
