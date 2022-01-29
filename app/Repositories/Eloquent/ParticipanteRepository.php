<?php

namespace App\Repositories\Eloquent;

use App\Models\Participante;
use App\Repositories\Contracts\ParticipanteRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Exception;

class ParticipanteRepository extends AbstractRepository implements ParticipanteRepositoryInterface
{
    protected $model = Participante::class;

    public function create($data)
    {
        try {
            $dados = (object)$data;

            DB::beginTransaction();

            $arrayNumerosEscolhidos = $this->retornaListaNumerosEscolhidos($dados->id_rifa, $dados->numeros);

            if($arrayNumerosEscolhidos){
                throw new \Exception("Os números [". implode(",", $arrayNumerosEscolhidos) ."] já foram escolhidos por outro usuário!");
            }

            foreach ($dados->numeros as $key => $value) {
                $part = new Participante();

                $part->id = uniqid("part_");
                $part->nome = $dados->nome;
                $part->email = $dados->email;
                $part->contato = $dados->contato;
                $part->id_rifa = $dados->id_rifa;
                $part->numeroEscolhido = $value;

                parent::create($part);
            }

            DB::commit();
        } catch (\HttpInvalidParamException $error){
            return $error->getMessage();
        }

        //return true;
    }

    private function retornaListaNumerosEscolhidos(string $id_rifa, array $numerosEscolhidosPart) // Verifica e coloca em um array os numeros que foram escolhidos enquanto o usuario se cadastrava na rifa.
    {
        $numerosJaEscolhidos = $this->buscaNumerosJaEscolhidos($id_rifa);
        $listNumerosProibidos = [];

        foreach ($numerosEscolhidosPart as $key => $value) {
            if(in_array($numerosEscolhidosPart[$key], $numerosJaEscolhidos)) {
                $listNumerosProibidos[$key] = $numerosEscolhidosPart[$key];
            }
        }

        return $listNumerosProibidos;
    }

    public function participantePorRifa(string $id, string $fitlro)
    {
        return Participante::where("id_rifa", $id)
            ->orderBy('vencedor', 'DESC')
            ->orderBy($fitlro)
            ->paginate(20);
    }

    public function verificaVencedor(string $id)
    {
        return count(Participante::where("id_rifa", $id)
            ->where('vencedor', true)
            ->get());
    }

    public function countParticipantesAprovados(string $id)
    {
        return count(Participante::where("id_rifa", $id)
            ->where('status', true)
            ->groupBy("email")
            ->get());
    }

    public function buscaParticipantesPorRifa(string $idRifa, string $emailPart, string $status)
    {
        return Participante::where("id_rifa", $idRifa)
            ->where("email", $emailPart)
            ->where("status", $status)
            ->get();
    }

    public function atualizaStatusParticipantes(array $listID)
    {
        $listID = (object)$listID;
        ($listID->funcao == "aprovar") ? $status = true : $status = false;

        foreach ($listID->idList as $indice => $value){
            $part = $this->find($value);
            $part->status = $status;
            $part->save();
        }
        return $listID;
    }

    public function buscaNumerosJaEscolhidos(string $idRifa)
    {
        $numerosEscolhidos = Participante::select('numeroEscolhido')
            ->where('id_rifa', $idRifa)
            ->get();

        $listNumeros = [];

        foreach ($numerosEscolhidos as $numeros => $value){
            $listNumeros[$numeros] = $value->numeroEscolhido;
        }

        return $listNumeros;
    }
}
