<?php

namespace App\BaseRepository\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


interface EloquentRepositoryInterface
{
    public function create(array $attribute): Model;

    public function make(array $attributes): Model;

    public function find($id): ?Model;

    public function findOneBy(array $conditions, array $relation = []): ?Model;

    public function findBy(array $conditions, array $relations = []): Collection;

    public function all(array $colums = ['*'], array $relations = []): Collection;

    public function associate(Model $model, array $relations): Model;

    public function update(array $data, Model $model): Model|bool;

    public function delete(Model $model): bool;
}
