<?php

namespace Rifa\Poramor\ServiceClasses;
use Carbon\Carbon;

class serviceClass
{

    public static function validaFechamento(string $data):string
    {
        $dataHoraExplode = explode(" ", $data);
        $dataExplode = explode("/", $dataHoraExplode[0]);
        $horaExplode = explode(":", $dataHoraExplode[1]);

        $dt = Carbon::create($dataExplode[2], $dataExplode[1], $dataExplode[0], $horaExplode[0],$horaExplode[1],$horaExplode[2]);

        return $dt;
    }
}