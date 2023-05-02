<?php

function hola_mundo(){
    echo " Hola Mundo";

}



function tiempoTranscurrido($fechaAsigna)
{

    date_default_timezone_set("America/Bogota");
    $fecha2 = date("Y-m-d H:i:s");

    if ($fechaAsigna != "") {

        $fecha1 = $fechaAsigna;

        $fechainicial = new DateTime($fechaAsigna);
        //fecha inicial 
        $fechaactual = new DateTime($fecha2);


        $diferencia = $fechainicial->diff($fechaactual);

        if (strtotime($fecha2) - strtotime($fecha1) < 0) {
            echo " la fecha actual debe ser mayor a ala del cargue";
            exit();
        };
        //echo $diferencia->format('%d dias %H horas %i minutos %s segundos  '); 

        $horaini = date('G', strtotime($fecha1));
        if ($horaini < 8 || $horaini > 16) {

           

           echo "Hora de registro debe ser entre las 8 AM y las 4 PM.  ";
        }
        $minutosini = date('i', strtotime($fecha1));
        $diferencia2 = strtotime($fecha2) - strtotime($fecha1);
        $minutosDiferencia2 = $diferencia2 / 60;
        $horasTranscurridas = $minutosDiferencia2 / 60;
        $diasTranscurridos = $horasTranscurridas / 24;
        $horasdia = 0;
        $minutosdia = 0;
        // si es otro dia...

        if (date('z', strtotime($fecha2)) - date('z', strtotime($fecha1)) > 0) {
            $horasdia = 16 - $horaini;
            if (date('i:', strtotime($fecha2) > 0)) {
                $horasdia = $horasdia - 1;
                $minutosdia = 60 - $minutosini;
                if ($minutosdia == 60) {
                    $horasdia = $horasdia + 1;
                    $minutosdia = 0;
                }
            }
        }/* si es el mismo dia  else*/ else {

            if (date('G', strtotime($fecha2)) >= $horaini) {
                if (date('G', strtotime($fecha2)) <= 16) {
                    $horasdia = date('G', strtotime($fecha2)) - $horaini;
                } else {
                    $horasdia = 16 - $horaini;
                }
                if (date('i', strtotime($fecha2)) <= $minutosini) {
                    $minutosdia = 60 - abs(date('i', strtotime($fecha2)) - $minutosini);
                    if ($minutosdia == 60) {
                        $minutosdia = 0;
                    } else {
                        $horasdia = $horasdia - 1;
                    }
                } else {
                    $minutosdia = abs(date('i', strtotime($fecha2)) - $minutosini);
                }
            } else {

                echo "No puede ser menor que la fecha de inicio";
            }
        }
        $diainc = 24 * 60 * 60;
        $diashabiles = array();
        // en este arreglo incluir los días feriados o festivos del año
        $diasferiados = ['2022-12-08', '2023-03-20'];
        for ($midia = strtotime($fecha1); $midia <= strtotime($fecha2); $midia += $diainc) {
            if (!in_array(date('N', $midia), array(6, 7))) {
                if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                    array_push($diashabiles, date('Y-m-d', $midia));
                }
            }
        }
        //echo " son estos dias habiles..." . count($diashabiles);
        //if($diferencia2<86400){
        if (date('G', strtotime($fecha2)) > $horaini) {
            $veces = count($diashabiles) - 1;
        } else {
            if (date('G', strtotime($fecha2)) == $horaini) {
                if (date('i', strtotime($fecha2)) >= $minutosini) {
                    $veces = count($diashabiles) - 1;
                } else {
                    $veces = count($diashabiles);
                }
            } else {
                $veces = count($diashabiles);
            }
        }

        //echo " son estas veces..." . $veces;

        // si es mas de una vez que entra 
        for ($i = 1; $i <= $veces; $i++) {
            if ($veces != $i) {
                $horasdia = $horasdia + 8;
            } else {
                if (date('G', strtotime($fecha2)) >= 16) {
                    $horasdia = $horasdia + 8;
                } else {
                    if (date('G', strtotime($fecha2)) > 8) {
                        $horasdia = $horasdia + (date('G', strtotime($fecha2)) - 8);
                        if (date('i', strtotime($fecha2)) <= $minutosini) {
                            $minutosdia = 60 - abs(date('i', strtotime($fecha2)) - $minutosini);
                            if ($minutosdia == 60) {
                                $horasdia = $horasdia + 1;
                                $minutosdia = 0;
                            }
                        } else {
                            if ($minutosdia + date('i', strtotime($fecha2)) >= 60) {
                                $horasdia = $horasdia + 1;
                            }
                            $minutosdia = abs(date('i', strtotime($fecha2)) - $minutosini);
                        }
                    }
                }
            }
        }
        $tiempolleva = [];
        if (floor($horasdia / 8) > 1) {

            $tiempolleva[1] = "btn-danger";
        } else {
            if (floor($horasdia / 8) == 1) {
                $tiempolleva[1] = "btn-warning";
            } else {
                $tiempolleva[1] = "btn-success";
            }
        }

        //$tiempolleva[0] = $horasdia;
        $tiempolleva[0] =  floor($horasdia / 8)  . " D: " . $horasdia % 8 . " h: " . $minutosdia . " m ";
    }

    return $tiempolleva;
}
?>