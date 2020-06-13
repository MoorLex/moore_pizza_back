<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $calories
 * @property integer $cheese
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $image
 * @property float $price
 * @property array $sizes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @mixin Builder
 */
class Pizza extends Model
{
    protected $table = 'pizzas';
    use SoftDeletes;

    protected $casts = [
        'id' => 'int',
        'calories' => 'int',
        'cheese' => 'int',
        'name' => 'string',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'price' => 'float',
        'sizes' => 'array'
    ];
}
