<?php

namespace App\Repositories\Eloquent;

abstract class AbstractRepository
{
    protected $model;

    public function __Construct()
    {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $this->model->find($id)->update($data);
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}
