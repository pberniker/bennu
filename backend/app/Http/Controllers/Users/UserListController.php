<?php
 
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Transformers\Users\UserTransformer;
use Domain\Models\User;
use Domain\Repositories\UserRepository;

class UserListController extends Controller
{
    public function __invoke(
        UserRepository $userRepository, 
        UserTransformer $userTransformer): array
    {
        $users = $userRepository->findAll();

        return $users->map(function (User $user) use ($userTransformer) {
            return $userTransformer->transform($user);
        })->toArray();
    }
}