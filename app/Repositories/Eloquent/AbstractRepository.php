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

    public function create($data)
    {
        $this->model->create($data->getAttributes());
    }

    public function update($data)
    {
        $this->model->find($data->id)->update($data->getAttributes());
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}
