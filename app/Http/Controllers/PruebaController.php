<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function reto7()
    {
        /* return $this->incrementsTicket('sdfsdv8sd'); */

        return $this->mask('123456789');

        return $this->josephSurvivor(41, 3);
    }

    public function josephSurvivor($personas, $ejecutadas)
    {
        $valores = [];

        if($personas > 0){
            for($i = 1; $i <= $personas; $i++)
            {
                array_push($valores, $i);
                foreach($valores as $val)
                {
                    $dale = $val;
                }
            }
        }else{
            return 'No hay personas en la lista';
        }
        return $dale;
    }

    public function mask($cadena)
    {
        $longitud_total = strlen($cadena);
        $longitud = $longitud_total - 4;
        
        if($longitud_total > 4){

            $ultimos = substr($cadena, -4);
            $demas = substr($cadena, 0, -4);
            $valor = $longitud * -1;

            $veamos = substr_replace($demas, "#", $cadena);

            return $veamos;

            for($i = 1; $i <= $longitud; $i++)
            {
                $imprime = "#";
                $add = strtr($demas, ($longitud), "#");
            }

            return $add;

            return $ultimos;

        }elseif($longitud_total == 4){

            return $cadena;

        }else{

            return 'No es posible enmascarar a: '. $cadena;
        }
    }

    public function incrementsTicket($ticket)
    {
        $ultimo = substr($ticket, -1);
        $demas = substr($ticket, 0, -1);

        if(is_numeric($ultimo)){

            $cambio = $ultimo + 1;

            return $demas . $cambio;

        }else{
            return 'No es un número el ultimo digito';
        }
    }
}
