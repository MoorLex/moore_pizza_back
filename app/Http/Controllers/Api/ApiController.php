<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(title="Moore Pizza API",
 *     version="1.0.0"
 * )
 *
 * @OA\OpenApi(security={ { "BearerAuth": {} } }
 * )
 *
 * @OA\Server(url="https://api.moore-pizza.ru/api")
 */

/**
 * @OA\SecurityScheme(securityScheme="BearerAuth",
 *     in="header",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class ApiController extends Controller
{
    const PAGE_SIZE = 100;
    const GROUP_SIZE = 10;
}
