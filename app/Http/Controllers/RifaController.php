<?php

namespace App\Http\Controllers;

use App\Http\Requests\RifaCreateRequest;
use App\Http\Requests\RifaUpdateRequest;
use App\Models\Participante;
use App\Models\Rifa;
use App\Repositories\Contracts\RifaRepositoryInterface;
use App\Repositories\Eloquent\ParticipanteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RifaController extends Controller
{
    private RifaRepositoryInterface $rifaRepository;
    private ParticipanteRepository $participanteRepository;

    public function __Construct(RifaRepositoryInterface $rifaRepository, ParticipanteRepository $participanteRepository)
    {
        $this->rifaRepository = $rifaRepository;
        $this->participanteRepository = $participanteRepository;
    }

    public function all()
    {
        $rifas = $this->rifaRepository->all();

        return view('home', compact('rifas'));
    }

    public function find(Request $request)
    {
        $filtro_session = $this->verificaSessao($request);

        $rifa = $this->rifaRepository->find($request->id);
        $participantes = $this->participanteRepository->participantePorRifa($request->id, $filtro_session);
        $countVencedores = $this->participanteRepository->verificaVencedor($request->id);

        return view('rifa', compact('rifa', 'participantes', 'countVencedores', 'filtro_session'));
    }

    public function create(RifaCreateRequest $request)
    {
        $rifa = new Rifa();

        $rifa->id = uniqid("rifa_");
        $rifa->nome = $request->nome_rifa;
        $rifa->dataFechamento = $request->data_fechamento;
        $rifa->limiteParticipantes = $request->limite_part;
        $rifa->objetivo = $request->objetivo;
        $rifa->premio = $request->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        $this->rifaRepository->create($rifa->getAttributes());

        return response()->json($request);
    }

    public function update(RifaUpdateRequest $request)
    {
        $rifa = Rifa::find($request->id_rifa);

        $rifa->nome = $request->nome_rifa;
        $rifa->dataFechamento = $request->data_fechamento;
        $rifa->objetivo = $request->objetivo;
        $rifa->premio = $request->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        $this->rifaRepository->update($rifa->getAttributes(), $rifa->id);

        return response()->json($rifa);
    }

    public function reopen(Request $request)
    {
        return response()->json($this->rifaRepository->reopen($request->id_rifa));
    }

    public function close(Request $request)
    {
        return response()->json($this->rifaRepository->close($request->id_rifa));
    }

    private function verificaSessao(Request $request) : string
    {
        $filtro = $request->filtro;

        if($filtro){
            $request->session()->put('filter', $request->filtro);
        }

        return $request->session()->get('filter') ?? '';
    }

    public function setSession(Request $request)
    {
        $request->session()->put('tab', $request->name);
        return response()->json("ok");
    }
}

