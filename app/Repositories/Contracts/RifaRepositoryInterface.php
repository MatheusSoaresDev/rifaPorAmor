<?php

namespace App\Repositories\Contracts;

interface RifaRepositoryInterface
{
    public function all();

    public function find($id);

    public function create($data);

    public function update($data);
}
