<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository {
    /**
     * @var Model
     */
    protected $model;

    public function __construct() {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel() {
        return app($this->model);
    }

    public function paginate(Builder $filter, $params)
    {
        $page = $params['page'] ?? 1;
        $per_page = $params['per_page'] ?? 200;

        if (!$filter) {
            $filter = $this->model;
        }

        return $filter->paginate($per_page, ['*'], 'page', $page);
    }
}