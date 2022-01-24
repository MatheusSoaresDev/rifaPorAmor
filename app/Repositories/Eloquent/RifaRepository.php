<?php

namespace App\Repositories\Eloquent;

use App\Models\Participante;
use App\Models\Rifa;
use App\Repositories\Contracts\RifaRepositoryInterface;

class RifaRepository extends AbstractRepository implements RifaRepositoryInterface
{
    protected $model = Rifa::class;

    public function create($data)
    {
        $rifa = new Rifa();

        $rifa->id = uniqid("rifa_");
        $rifa->nome = $data->nome_rifa;
        $rifa->dataFechamento = $data->data_fechamento;
        $rifa->limiteParticipantes = $data->limite_part;
        $rifa->objetivo = $data->objetivo;
        $rifa->premio = $data->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        parent::create($rifa);

        return $rifa;
    }

    public function update($data)
    {
        $rifa = $this->find($data->id);

        $rifa->nome = $data->nome_rifa;
        $rifa->dataFechamento = $data->data_fechamento;
        $rifa->objetivo = $data->objetivo;
        $rifa->premio = $data->premio;

        parent::update($rifa);

        return $rifa;
    }

    public function reopen(string $id)
    {
        $rifa = $this->find($id);
        $rifa->status = true;
        $rifa->save();

        return $rifa;
    }

    public function close(string $id)
    {
        $rifa = $this->find($id);
        $rifa->status = false;
        $rifa->save();

        return $rifa;
    }

    public function finally(string $id)
    {
        $rifa = $this->find($id);
        $rifa->status = 2;
        $rifa->save();

        return $rifa;
    }

    public function sortearVencedor($id)
    {
        $vencedor = Participante::inRandomOrder()
            ->where('status', true)
            ->where('id_rifa', $id)
            ->first();

        $vencedor->vencedor = true;
        $vencedor->save();

        return response()->json($vencedor);
    }

    public function resetarSorteio($id)
    {
        $vencedores = Participante::where("id_rifa", $id)
        ->where('vencedor', true)
        ->get();

        $this->close($id); // Mudar status da rifa para fechado;

        foreach ($vencedores as $vencedor) {
            $vencedor->vencedor = false;
            $vencedor->save();
        }

        return response()->json($vencedores);
    }
}
