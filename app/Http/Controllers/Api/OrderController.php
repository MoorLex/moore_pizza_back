<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Repositories\OrderRepository;
use App\Http\Transformers\OrderResource;
use App\Http\Requests\OrderCreateRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends ApiController
{
    protected $repository = OrderRepository::class;

    /** @var string|OrderResource  */
    protected $transformerClass = OrderResource::class;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Post(path="/orders",
     *     tags={"Order"},
     *     summary="Create Order",
     *     description="",
     *     operationId="postOrder",
     *     security={},
     *     requestBody={
     *         "$ref": "#/components/requestBodies/OrderCreateRequest"
     *     },
     *     @OA\Response(response=200,
     *         description="success",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(type="object",
     *                 @OA\Property(property="data",
     *                      ref="#/components/schemas/Order"
     *                  )
     *             )
     *         )
     *     )
     * )
     * @param OrderCreateRequest $request
     * @return JsonResource
     */
    public function store(OrderCreateRequest $request): JsonResource
    {
        $create = $this->repository->create($request->validated());
        return new $this->transformerClass($create);
    }

    /**
     * @OA\Get(path="/orders/{token}",
     *     tags={"Order"},
     *     summary="Order info",
     *     description="",
     *     operationId="getOrder",
     *     @OA\Parameter(name="token",
     *         in="path",
     *         description="Order token",
     *         required=true,
     *         example="66JNGl-gI5Xcl-nZbHDW",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200,
     *         description="success",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(type="object",
     *                 @OA\Property(property="data",
     *                      ref="#/components/schemas/Order"
     *                  )
     *             )
     *         )
     *     )
     * )
     * @param string $token
     * @return JsonResource
     */
    public function show(string $token): JsonResource
    {
        $model = $this->repository->findOrFail($token);
        return new $this->transformerClass($model);
    }
}
