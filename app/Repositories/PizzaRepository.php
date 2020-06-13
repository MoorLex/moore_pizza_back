<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Pizza as ActiveRecord;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 * @method ActiveRecord findOrFail(int $id)
 * @method ?ActiveRecord find(int $id)
 * @method ActiveRecord update(int $id, array $data)
 */
class PizzaRepository extends BaseRepository
{
    protected $activeRecord = ActiveRecord::class;

    public function __construct(ActiveRecord $model)
    {
        $this->activeRecord = $model;
    }

    public function filterAndPaginate(Request $request, int $pageSize): LengthAwarePaginator
    {
        $items = $this->activeRecord->orderBy('created_at', 'desc');
        if ($request->input('query')) {
            $items = $this->activeRecord->where('name', 'like', "%{$request->input('query')}%");
        }
        return $items->paginate($pageSize);
    }

    public function popular(int $pageSize): LengthAwarePaginator
    {
        $items = $this->activeRecord->where('popular', true);
        return $items->paginate($pageSize);
    }
}
