<?php
 
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Transformers\Users\UserTransformer;
use Domain\Repositories\UserRepository;

class RootUserGetterController extends Controller
{
    public function __invoke(
        UserRepository $userRepository, 
        UserTransformer $userTransformer): array
    {
        $user = $userRepository->getRoot();
        
        return $userTransformer->transform($user);
    }
}