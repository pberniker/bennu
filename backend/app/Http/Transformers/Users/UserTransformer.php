<?php

namespace App\Http\Transformers\Users;

use Domain\Models\User;

class UserTransformer
{
    public function transform(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'address' => $user->address(),
            'phone' => $user->phone,
            'website' => $user->website,
            'company' => $user->company(),
        ];
    }
}
