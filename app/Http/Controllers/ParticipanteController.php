<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Repositories\Contracts\ParticipanteRepositoryInterface;
use App\Repositories\Contracts\RifaRepositoryInterface;
use App\Repositories\Eloquent\ParticipanteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    private RifaRepositoryInterface $rifaRepository;
    private ParticipanteRepositoryInterface $participanteRepository;

    public function __Construct( ParticipanteRepositoryInterface $participanteRepository, RifaRepositoryInterface $rifaRepository)
    {
        $this->participanteRepository = $participanteRepository;
        $this->rifaRepository = $rifaRepository;
    }

    public function buscaParticipantesPorRifa(Request $request)
    {
        return response()->json($this->participanteRepository->buscaParticipantesPorRifa($request->id, $request->email));
    }

    public function atualizaStatusParticipantes(Request $request)
    {
        //dd($request->all();
        return response()->json($this->participanteRepository->atualizaStatusParticipantes($request->all()));
    }
}
