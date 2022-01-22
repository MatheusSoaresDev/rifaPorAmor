<?php

namespace App\Repositories\Contracts;

interface RifaRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);
}
