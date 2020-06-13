<?php
declare(strict_types=1);

namespace App\Http\Transformers;

use App\Models\Pizza;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="PizzaSmall",
 *     title="PizzaSmall",
 *     type="object"
 * )
 */
class PizzaSmallResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * @var Pizza $this
         */
        return [
            /**
             * @OA\Property(property="id",
             *     description="Pizza id",
             *     type="integer"
             * )
             */
            'id' => $this->id,
            /**
             * @OA\Property(property="name",
             *     description="Pizza name",
             *     type="string"
             * )
             */
            'name' => $this->name,
            /**
             * @OA\Property(property="price",
             *     description="Pizza price",
             *     type="number"
             * )
             */
            'price' => $this->price,
            /**
             * @OA\Property(property="sizes",
             *     description="Pizza sizes",
             *     type="array",
             *     @OA\Items(type="number")
             * )
             */
            'sizes' => $this->sizes
        ];
    }
}
