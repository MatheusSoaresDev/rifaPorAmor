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
    private ParticipanteRepositoryInterface $participanteRepository;
    private RifaRepositoryInterface $rifaRepository;

    public function __Construct(ParticipanteRepositoryInterface $participanteRepository, RifaRepositoryInterface $rifaRepository)
    {
        $this->participanteRepository = $participanteRepository;
        $this->rifaRepository = $rifaRepository;
    }

    public function sortearVencedor(Request $request)
    {
        $this->rifaRepository->finally($request->id_rifa);
        return $this->participanteRepository->sortearVencedor($request->id_rifa);
    }
}
