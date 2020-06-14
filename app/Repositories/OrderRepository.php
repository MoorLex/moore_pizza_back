<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order as ActiveRecord;
use Illuminate\Support\Str;

class OrderRepository
{
    protected $activeRecord = ActiveRecord::class;

    public function __construct(ActiveRecord $model)
    {
        $this->activeRecord = $model;
    }

    public function findOrFail(string $token): ActiveRecord
    {
        $model = $this->activeRecord->where(['token' => $token]);
        return $model->firstOrFail();
    }

    public function create(array $params): ActiveRecord
    {
        $params['token'] = join('-', str_split(Str::random(6 * 3), 6));
        return $this->activeRecord->create($params);
    }
}
