<?php
 
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserCreatorRequest;
use App\Http\Transformers\Users\UserTransformer;
use Domain\Payloads\UserPayload;
use Domain\Services\Users\UserCreatorService;

class UserCreatorController extends Controller
{
    public function __invoke(
        UserCreatorRequest $userCreatorRequest,
        UserCreatorService $userCreatorService,
        UserTransformer $userTransformer): array
    {
        $user = $userCreatorService->invoke($userCreatorRequest); 

        return $userTransformer->transform($user);
    }
}