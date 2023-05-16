<?php

namespace Domain\Repositories;

use Illuminate\Database\Eloquent\Model;

interface PersistRepository
{
    public function persist(Model $model): void;
}
