<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use Illuminate\Http\Request;

class RifaController extends Controller
{
    public function store(Request $request)
    {
        $rifa = Rifa::create([
            'nome' => "Teste",
            "dataFechamento" => date("Y-m-d"),
            "limiteParticipantes" => 50,
            "premio" => "Cupom Outback",
            "objetivo" => "almoço solidário",
            "user_id" => 1,
        ]);

        dd($rifa);
    }
}
