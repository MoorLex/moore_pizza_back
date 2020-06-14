<?php
declare(strict_types=1);

namespace App\Http\Transformers;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/**
 * @OA\Schema(schema="Order",
 *     title="Order",
 *     type="object"
 * )
 */
class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * @var Order $this
         */
        return [
            /**
             * @OA\Property(property="id",
             *     description="Order id",
             *     type="integer"
             * )
             */
            'id' => $this->id,
            /**
             * @OA\Property(property="status",
             *     description="Order status",
             *     type="integer"
             * )
             */
            'status' => $this->status,
            /**
             * @OA\Property(property="price",
             *     description="Order price",
             *     type="integer"
             * )
             */
            'price' => $this->price,
            /**
             * @OA\Property(property="first_name",
             *     description="First Name",
             *     type="string"
             * )
             */
            'first_name' => $this->first_name,
            /**
             * @OA\Property(property="last_name",
             *     description="Last Name",
             *     type="string"
             * )
             */
            'last_name' => $this->last_name,
            /**
             * @OA\Property(property="city",
             *     description="City",
             *     type="string"
             * )
             */
            'city' => $this->city,
            /**
             * @OA\Property(property="address",
             *     description="Address",
             *     type="string"
             * )
             */
            'address' => $this->address,
            /**
             * @OA\Property(property="phone",
             *     description="Phone",
             *     type="string"
             * )
             */
            'phone' => $this->phone,
            /**
             * @OA\Property(property="email",
             *     description="Email Address",
             *     type="string"
             * )
             */
            'email' => $this->email,
            /**
             * @OA\Property(property="notes",
             *     description="Order Notes",
             *     type="string"
             * )
             */
            'notes' => $this->notes,
            /**
             * @OA\Property(property="products",
             *     description="Order products",
             *     type="array",
             *     @OA\Items(type="object",
             *          @OA\Property(property="product",
             *              ref="#/components/schemas/PizzaSmall"
             *          ),
             *          @OA\Property(property="settings",
             *              type="object"
             *          )
             *     )
             * )
             */
            'products' => $this->productsList(),
            /**
             * @OA\Property(property="created_at",
             *     description="Created Date",
             *     type="string"
             * )
             */
            'created_at' => $this->attributesToArray()['created_at'] ?? '',
            /**
             * @OA\Property(property="created_at",
             *     description="Created Date",
             *     type="string"
             * )
             */
            'token' => $this->token
        ];
    }
}
