<?php

namespace App\Repositories\Contracts;

interface ParticipanteRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);
}
