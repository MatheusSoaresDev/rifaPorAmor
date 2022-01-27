<?php

namespace App\Repositories\Eloquent;

use App\Models\Participante;
use App\Repositories\Contracts\ParticipanteRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ParticipanteRepository extends AbstractRepository implements ParticipanteRepositoryInterface
{
    protected $model = Participante::class;

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
}
