<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository {

    protected $model = Customer::class;

    public function list(array $data)
    {
        return $this->model::all();
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