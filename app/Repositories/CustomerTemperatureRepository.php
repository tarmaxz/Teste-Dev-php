<?php

namespace App\Repositories;

use App\Models\CustomerTemperature;
use App\Exceptions\BusinessException;

class CustomerTemperatureRepository extends AbstractRepository {

    protected $model = CustomerTemperature::class;

    private function findTemperature($id)
    {
        $response = $this->model::find($id);
        if (!$response) {
            return throw new BusinessException('Temperatura não encontrada.');
        }
        return $response;
    }
    
    public function validatorCustomerTemperature($id)
    {
        if ($id) {
            return $this->findTemperature($id);
        }
        return [];
    }
}