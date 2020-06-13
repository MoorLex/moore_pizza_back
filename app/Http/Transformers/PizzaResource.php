<?php
declare(strict_types=1);

namespace App\Http\Transformers;

use App\Models\Pizza;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="Pizza",
 *     title="Pizza",
 *     type="object"
 * )
 */
class PizzaResource extends JsonResource
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
             * @OA\Property(property="title",
             *     description="Pizza title",
             *     type="string"
             * )
             */
            'title' => $this->title,
            /**
             * @OA\Property(property="description",
             *     description="Pizza description",
             *     type="string"
             * )
             */
            'description' => $this->description,
            /**
             * @OA\Property(property="image",
             *     description="Pizza image",
             *     type="string"
             * )
             */
            'image' => $this->image,
            /**
             * @OA\Property(property="price",
             *     description="Pizza price",
             *     type="number"
             * )
             */
            'price' => $this->price,
            /**
             * @OA\Property(property="calories",
             *     description="Pizza calories",
             *     type="integer"
             * )
             */
            'calories' => $this->calories,
            /**
             * @OA\Property(property="cheese",
             *     description="Pizza cheese",
             *     type="integer"
             * )
             */
            'cheese' => $this->cheese,
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
