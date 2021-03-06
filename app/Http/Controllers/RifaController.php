<?php

namespace App\Http\Controllers;

use App\Http\Requests\RifaCreateRequest;
use App\Http\Requests\RifaUpdateRequest;
use App\Models\Participante;
use App\Models\Rifa;
use App\Repositories\Contracts\ParticipanteRepositoryInterface;
use App\Repositories\Contracts\RifaRepositoryInterface;
use App\Repositories\Eloquent\ParticipanteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RifaController extends Controller
{
    private RifaRepositoryInterface $rifaRepository;
    private ParticipanteRepositoryInterface $participanteRepository;

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

    public function find(string $id)
    {
        return $this->rifaRepository->find($id);
    }

    public function create(RifaCreateRequest $request)
    {
        return response()->json($this->rifaRepository->create($request));
    }

    public function update(RifaUpdateRequest $request)
    {
        return response()->json($this->rifaRepository->update($request));
    }

    public function close(Request $request)
    {
        return response()->json($this->rifaRepository->close($request->id));
    }

    public function reopen(Request $request)
    {
        return response()->json($this->rifaRepository->reopen($request->id));
    }


    public function rifaAdm(Request $request)
    {
        $filtro_session = $this->verificaSessao($request);

        $rifa = $this->find($request->id);
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

    public function dadosRifaParticipante(Request $request)
    {
        $rifa = $this->find($request->id);

        if(!$rifa){
            return abort(404);
        }

        $numerosJaEscolhidos = $this->participanteRepository->buscaNumerosJaEscolhidos($request->id);

        if($rifa->status == false){
            return view("rifafechada");
        }

        return view('participante', compact('rifa', 'numerosJaEscolhidos'));
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
        return $this->rifaRepository->sortearVencedor($request->id);
    }

    public function resetaSorteio(Request $request)
    {
        return response()->json($this->rifaRepository->resetarSorteio($request->id));
    }

    public function sucesso()
    {
        if(!session('valorTotalRifa')){
            return abort(404);
        }

        return view('sucesso');
    }

    public function rifaFechadaView()
    {
        return view('rifafechada');
    }
}

