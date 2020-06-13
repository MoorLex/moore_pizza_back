<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\RequestBody(request="OrderCreateRequest",
 *     description="",
 *     @OA\MediaType(mediaType="application/json",
 *         @OA\Schema(ref="#/components/schemas/OrderCreateRequest")
 *     )
 * )
 */

/**
 * @OA\Schema(required={"name"},
 *     schema="OrderCreateRequest",
 *     type="object"
 * )
 */
class OrderCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            /**
             * @OA\Property(property="products",
             *   type="array",
             *   description="Products",
             *   @OA\Items(type="object")
             * )
             */
            'products' => 'required',
            /**
             * @OA\Property(property="price",
             *   type="integer",
             *   description="Order Price",
             *   example=12.99
             * )
             */
            'price' => 'required|numeric',
            /**
             * @OA\Property(property="first_name",
             *   type="string",
             *   description="First Name",
             *   example="Alex"
             * )
             */
            'first_name' => 'required|string',
            /**
             * @OA\Property(property="last_name",
             *   type="string",
             *   description="Last Name",
             *   example="moore"
             * )
             */
            'last_name' => 'required|string',
            /**
             * @OA\Property(property="city",
             *   type="string",
             *   description="City",
             *   example="Albuquerque"
             * )
             */
            'city' => 'required|string',
            /**
             * @OA\Property(property="address",
             *   type="string",
             *   description="Street Address",
             *   example="3828 Piermont Dr"
             * )
             */
            'address' => 'required|string',
            /**
             * @OA\Property(property="phone",
             *   type="string",
             *   description="Phone Number",
             *   example="+12345678901"
             * )
             */
            'phone' => 'required|string',
            /**
             * @OA\Property(property="email",
             *   type="string",
             *   description="Email Address",
             *   example="email@example.com"
             * )
             */
            'email' => 'required|email',
            /**
             * @OA\Property(property="notes",
             *   type="string",
             *   description="Order Notes",
             *   example="You Are Best"
             * )
             */
            'notes' => 'sometimes|nullable|string',
            /**
             * @OA\Property(property="product_id",
             *   type="integer",
             *   description="Products Id",
             *   example=1
             * )
             */
            'products.*.product_id' => 'required|integer'
        ];
    }
}
