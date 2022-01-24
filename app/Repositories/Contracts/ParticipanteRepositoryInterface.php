<?php

namespace App\Repositories\Contracts;

interface ParticipanteRepositoryInterface
{
    public function all();

    public function find($id);

    public function create($data);

    public function update($data);
}
