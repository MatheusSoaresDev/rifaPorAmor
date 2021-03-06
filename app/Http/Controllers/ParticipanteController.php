<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartCreateRequest;
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

    public function __Construct(ParticipanteRepositoryInterface $participanteRepository, RifaRepositoryInterface $rifaRepository)
    {
        $this->participanteRepository = $participanteRepository;
        $this->rifaRepository = $rifaRepository;
    }

    public function create(PartCreateRequest $request)
    {
        return response()->json($this->participanteRepository->create($request->all()));
    }

    public function buscaParticipantesPorRifa(Request $request)
    {
        return response()->json($this->participanteRepository->buscaParticipantesPorRifa($request->id, $request->email, $request->status));
    }

    public function atualizaStatusParticipantes(Request $request)
    {
        return response()->json($this->participanteRepository->atualizaStatusParticipantes($request->all()));
    }

    public function removerParticipante(Request $request)
    {
        return response()->json($this->participanteRepository->delete($request->id));
    }
}
