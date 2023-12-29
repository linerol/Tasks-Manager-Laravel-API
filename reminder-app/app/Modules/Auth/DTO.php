<?php

namespace App\Modules\Auth;
class DTO
{
    private $entity;

    public function __construct($model)
    {
        $this->entity = (object) $model->toArray();
    }
    public static function make($model)
    {
        return new self($model);
    }

    public function __get($name)
    {
        return $this->entity->{$name};
    }

    public function __getEntity()
    {
        return $this->entity;
    }
}
