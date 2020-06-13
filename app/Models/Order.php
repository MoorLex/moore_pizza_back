<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Transformers\PizzaSmallResource;

/**
 * @property integer $id
 * @property integer $status
 * @property float $price
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $notes
 * @property array $products
 * @property Carbon|null $created_at
 *
 * @mixin Builder
 */
class Order extends Model
{
    protected $table = 'orders';
    use SoftDeletes;

    protected $fillable = [
        'price',
        'first_name',
        'last_name',
        'city',
        'address',
        'phone',
        'email',
        'notes',
        'products'
    ];

    protected $casts = [
        'id' => 'int',
        'status' => 'int',
        'price' => 'float',
        'first_name' => 'string',
        'last_name' => 'string',
        'city' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'notes' => 'string',
        'products' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function productsList()
    {
        $products = [];
        foreach ($this->products as $item) {
            $product = app(Pizza::class)->find($item['product_id']);
            $products[] = [
                'product' => new PizzaSmallResource($product),
                'settings' => $item['settings']
            ];
        }
        return $products;
    }
}
