<?php

namespace App\Repositories\Eloquent;

use App\Models\Rifa;
use App\Repositories\Contracts\RifaRepositoryInterface;

class RifaRepository extends AbstractRepository implements RifaRepositoryInterface
{
    protected $model = Rifa::class;

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
}
