<?php
namespace App\Helpers\AlgorithmHelper;

class AlgorithmHelper
{
    public static function resolve($plate)
    {
        $takenNumber = null;
        $plateType = null;
        $validation = null;
        $p_array = self::strToArray($plate);

        if (is_int($p_array[0]) && is_int($p_array[1]) && is_int($p_array[2]) && is_int($p_array[3]) ){
            $takenNumber = $p_array[3];
            $plateType = 'Federal';
        }elseif (is_int($p_array[0]) && is_int($p_array[1]) && is_int($p_array[2])){
            $takenNumber = $p_array[2];
            $plateType = 'Federal';
        }else{
            foreach($p_array as $variable){
                if (is_int($variable)){
                    $takenNumber = $variable;
                    $plateType = 'Estatal';
                }
            }
        }

        if ($takenNumber === 5 || $takenNumber === 6){
            $validation = ['Enero','Febrero','Marzo','Abril'];
        }elseif ($takenNumber === 7 || $takenNumber === 9){
            $validation = ['Marzo','Abril','Mayo','Junio'];
        }elseif ($takenNumber === 3 || $takenNumber === 4) {
            $validation = ['Mayo', 'Junio', 'Julio', 'Agosto'];
        }elseif ($takenNumber === 1 || $takenNumber === 2){
            $validation = ['Julio','Agosto','Septiembre','Octubre'];
        }elseif ($takenNumber === 9 || $takenNumber === 0){
            $validation = ['Septiembre','Octubre','Noviembre','Diciembre'];
        }

        return ['takenNumber' => $takenNumber, 'plateType' => $plateType, 'validationMonths' => $validation];
    }

    private static function strToArray($plate)
    {
        $response = [];
        foreach (str_split($plate) as $letter){
            $intLetter = intval($letter);
            $val = $intLetter;
            if ($intLetter === 0 && $letter !== 0){
                $val = $letter;
            }
            array_push($response, $val);
        }
        return $response;
    }

    public static function numToMonth($num){
        switch (intval($num)){
            case 1: return 'Enero';
            case 2: return 'Febrero';
            case 3: return 'Marzo';
            case 4: return 'Abril';
            case 5: return 'Mayo';
            case 6: return 'Junio';
            case 7: return 'Julio';
            case 8: return 'Agosto';
            case 9: return 'Septiembre';
            case 10: return 'Octubre';
            case 11: return 'Noviembre';
            case 12: return 'Diciembre';
        }
    }
}
