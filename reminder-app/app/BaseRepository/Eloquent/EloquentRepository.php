<?php

namespace App\BaseRepository\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attribute): Model
    {
        return $this->model->create($attribute);
    }


    public function make(array $attributes): Model
    {
        return $this->model->make($attributes);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function findBy(array $conditions, array $relations = []): Collection
    {
        $query = $this
            ->model
            ->with($relations)
            ->where($conditions);

        $results = $query->get();
        return $results;
    }

    public function all(array $colums = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($colums);
    }

    public function associate(Model $model, array $relations): Model
    {
        foreach ($relations as $key => $value) {
            $model->$key()->associate($value);
        }
        $model->save();
        return $model;
    }

    public function findOneBy(array $conditions, array $relations = []): ?Model
    {
        return $this
            ->model
            ->with($relations)
            ->where($conditions)
            ->first();
    }

    public function update(array $data, Model $model): Model|bool
    {
        return $model->update($data) ? $model : false;
    }
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}