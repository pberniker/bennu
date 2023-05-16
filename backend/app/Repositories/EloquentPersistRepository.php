<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Domain\Exceptions\AlreadyExistsModelException;
use Domain\Repositories\PersistRepository;

class EloquentPersistRepository implements PersistRepository
{
    public function persist(Model $model): void
    {
        try {
            $model->save();
        }
        catch (QueryException $e) {
            if ($e->getCode() == 23000) {            
                throw new AlreadyExistsModelException($model);
            }

            throw $e;
        }
        catch (\Throwable $e) {        
            throw $e;
        }        
    }  
}
