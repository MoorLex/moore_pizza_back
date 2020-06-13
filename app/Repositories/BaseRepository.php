<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function create(array $params): Model
    {
        return $this->activeRecord->create($params);
    }

    public function paginate(int $pageSize): LengthAwarePaginator
    {
        return $this->activeRecord->paginate($pageSize);
    }

    public function findOrFail(int $id): Model
    {
        return $this->activeRecord->findOrFail($id);
    }

    public function find(int $id): ?Model
    {
        return $this->activeRecord->find($id);
    }

    public function update(int $id, array $data): Model
    {
        /** @var Model $model */
        $model = $this->activeRecord->findOrFail($id);

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete(int $id): int
    {
        return $this->activeRecord->destroy($id);
    }
}
