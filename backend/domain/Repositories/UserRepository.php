<?php

namespace Domain\Repositories;

use Illuminate\Support\Collection;
use Domain\Models\User;

interface UserRepository
{
    public function getRoot(): User;
    public function get(int $id): User;
    public function findAll(): Collection;
    public function getCount(): int;
}
