<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Repositories\PizzaRepository;
use App\Http\Transformers\PizzaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PizzaController extends ApiController
{
    protected $repository = PizzaRepository::class;

    /** @var string|PizzaResource  */
    protected $transformerClass = PizzaResource::class;

    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(path="/pizzas",
     *     tags={"Pizza"},
     *     summary="Pizzas list",
     *     description="",
     *     operationId="getPizzas",
     *     security={},
     *     @OA\Response(response=200,
     *         description="success",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(type="object",
     *                 @OA\Property(type="array",
     *                      property="data",
     *                      description="Wrapper",
     *                      @OA\Items(ref="#/components/schemas/Pizza")
     *                  )
     *             )
     *         )
     *     )
     * )
     * @param Request $request
     * @return JsonResource
     */
    public function index(Request $request): JsonResource
    {
        $list = $this->repository->filterAndPaginate($request, self::PAGE_SIZE);
        return $this->transformerClass::collection($list);
    }

    /**
     * @OA\Get(path="/pizzas/popular",
     *     tags={"Pizza"},
     *     summary="Pizzas popular list",
     *     description="",
     *     operationId="getPopularPizzas",
     *     security={},
     *     @OA\Response(response=200,
     *         description="success",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(type="object",
     *                 @OA\Property(type="array",
     *                      property="data",
     *                      description="Wrapper",
     *                      @OA\Items(ref="#/components/schemas/Pizza")
     *                  )
     *             )
     *         )
     *     )
     * )
     * @return JsonResource
     */
    public function popular(): JsonResource
    {
        $list = $this->repository->popular(self::PAGE_SIZE);
        return $this->transformerClass::collection($list);
    }

    /**
     * @OA\Get(path="/pizza/{id}",
     *     tags={"Pizza"},
     *     summary="Pizza info",
     *     description="",
     *     operationId="getPizza",
     *     @OA\Parameter(name="id",
     *         in="path",
     *         description="Pizza id",
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
     *                      ref="#/components/schemas/Pizza"
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
