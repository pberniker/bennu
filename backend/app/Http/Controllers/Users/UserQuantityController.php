<?php
 
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Domain\Repositories\UserRepository;

class UserQuantityController extends Controller
{
    public function __invoke(UserRepository $userRepository): array
    {
        $count = $userRepository->getCount();

        return [
            'count' => $count
        ];
    }
}