<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order as ActiveRecord;

/**
 * @method ActiveRecord findOrFail(int $id)
 * @method ?ActiveRecord find(int $id)
 * @method ActiveRecord update(int $id, array $data)
 */
class OrderRepository extends BaseRepository
{
    protected $activeRecord = ActiveRecord::class;

    public function __construct(ActiveRecord $model)
    {
        $this->activeRecord = $model;
    }
}
