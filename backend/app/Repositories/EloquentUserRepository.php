<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Domain\Exceptions\NotExistsModelException;
use Domain\Models\User;
use Domain\Repositories\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function get(int $id): User
    {
        $user = User::find($id);

        if ($user) {
            return $user;            
        } 

        throw new NotExistsModelException(User::Class, $id);
    }

    public function getRoot(): User
    {
        return User::where('root', true)->first();
    }

    public function findAll(): Collection
    {
        return User::all();
    }

    public function getCount(): int
    {
        return User::count();
    }     
}
