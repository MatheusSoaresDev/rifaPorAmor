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

        $countParticipantesAprovados = $this->participanteRepository->countParticipantesAprovados($request->id);
        $countVencedores = $this->participanteRepository->verificaVencedor($request->id);

        return view('rifa', compact(
            'rifa',
            'participantes',
            'countVencedores',
            'countParticipantesAprovados',
            'filtro_session')
        );
    }

    public function create(RifaCreateRequest $request)
    {
        return response()->json($this->rifaRepository->create($request));
    }

    public function update(RifaUpdateRequest $request)
    {
        return response()->json($this->rifaRepository->update($request));
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

    public function sortearVencedor(Request $request)
    {
        $this->rifaRepository->finally($request->id_rifa);
        return $this->rifaRepository->sortearVencedor($request->id_rifa);
    }

    public function resetaSorteio(Request $request)
    {
        return response()->json($this->rifaRepository->resetarSorteio($request->id_rifa));
    }
}

