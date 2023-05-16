<?php

namespace Domain\Exceptions;

class NotExistsModelException extends \Exception
{
    public function __construct(string $model, int $id)
    {
        parent::__construct(class_basename($model) . " not exists (#{$id})");
    }
}
