<?php

namespace Domain\Exceptions;

use Illuminate\Database\Eloquent\Model;

class AlreadyExistsModelException extends \Exception
{
    public function __construct(Model $model)
    {
        parent::__construct(class_basename($model) . ' aleady exists');
    }
}
