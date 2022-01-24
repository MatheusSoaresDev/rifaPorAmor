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

    public function __Construct(RifaRepositoryInterface $rifaRepository)
    {
        $this->rifaRepository = $rifaRepository;
    }
}
