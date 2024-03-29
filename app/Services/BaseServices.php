<?php


namespace App\Services;
use App\Models\BaseModel as Model;

class BaseServices
{
    public $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
