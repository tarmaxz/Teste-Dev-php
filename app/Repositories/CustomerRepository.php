<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class CustomerRepository extends AbstractRepository {

    protected $model = Customer::class;

    public function filter($params, $query = null): Builder
    {
        if ($query == null) {
            $filter = $this->model->query();
        } else {

            if (!empty($params['filter_name_full'])) {
                $name = $params['filter_name_full'];
                $query->where('name_full', 'like', "%$name%");
            }

            $filter = $query;
        }

        return $filter;
    }

    public function list($params)
    {
        $query = $this->model->query();

        $filter = $this->filter($params, $query);

        return $this->paginate($filter, $params);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function update(array $data, $id)
    {
        $response = $this->find($id);
        $response->update($data);

        return $response;
    }

    public function delete($id)
    {
        $response = $this->find($id);
        $response->delete();
        return $response;
    }
}