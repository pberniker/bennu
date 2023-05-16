<?php
 
namespace Domain\Services\Users;

use Domain\Payloads\UserCreatorPayload;
use Domain\Models\User;
use Domain\Repositories\PersistRepository;
use Illuminate\Support\Facades\Hash;

class UserCreatorService
{
    public function __construct(private PersistRepository $persistRepository)
    {
    }

    public function invoke(UserCreatorPayload $userCreatorPayload): User
    {
        $user = new User();

        $user->name = $userCreatorPayload->name();
        $user->username = $userCreatorPayload->username();
        $user->email = $userCreatorPayload->email();
        $user->street = $userCreatorPayload->street();
        $user->suite = $userCreatorPayload->suite();
        $user->city = $userCreatorPayload->city();
        $user->zipcode = $userCreatorPayload->zipcode();
        $user->lat = $userCreatorPayload->lat();
        $user->lng = $userCreatorPayload->lng();
        $user->phone = $userCreatorPayload->phone();
        $user->website = $userCreatorPayload->website();
        $user->company = $userCreatorPayload->company();
        $user->catch_phrase = $userCreatorPayload->catchPhrase();
        $user->bs = $userCreatorPayload->bs();

        $this->persistRepository->persist($user);

        return $user;
    }
}