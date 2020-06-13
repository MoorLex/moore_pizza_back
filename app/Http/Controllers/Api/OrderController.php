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
     * @OA\Get(path="/orders/{id}",
     *     tags={"Order"},
     *     summary="Order info",
     *     description="",
     *     operationId="getOrder",
     *     @OA\Parameter(name="id",
     *         in="path",
     *         description="Order id",
     *         required=true,
     *         example=1,
     *         @OA\Schema(type="integer",
     *             format="int64"
     *         )
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
     * @param int $id
     * @return JsonResource
     */
    public function show(int $id): JsonResource
    {
        $model = $this->repository->findOrFail($id);
        return new $this->transformerClass($model);
    }
}
