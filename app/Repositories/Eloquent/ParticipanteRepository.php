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
            ->get());

    }
}
