<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use App\Integrations\BrasilApi;
use App\Exceptions\BusinessException;

class CustomerRepository extends AbstractRepository {

    protected $model = Customer::class;

    public function filter($params, $query = null): Builder
    {
        if ($query == null) {
            $filter = $this->model->query();

            $query->orderBy('id', 'DESC');

            $filter = $query;

        } else {

            if (!empty($params['filter_name_full'])) {
                $name = $params['filter_name_full'];
                $query->where('name_full', 'like', "%$name%");
            }

            if (!empty($params['filter_cpf'])) {
                $cpf = $params['filter_cpf'];
                $query->where('cpf', $cpf);
            }

            if (!empty($params['filter_cpf'])) {
                $cep = $params['filter_cpf'];
                $query->where('cpf', $cep);
            }

            $query->orderBy('id', 'DESC');

            $filter = $query;
        }

        return $filter;
    }

    public function all($params)
    {
        $query = $this->model->query();

        $filter = $this->filter($params, $query);

        return $this->paginate($filter, $params);
    }

    public function create(array $data)
    {
        $responseCustomer = $this->model::where('email', $data['email'])->whereOr('cpf', $data['cpf'])->first();

        if ($responseCustomer) {
            throw new BusinessException('O cliente já está cadastrado');
        }
        
        $response = BrasilApi::getCepV2($data['zip_code']);

        if (!empty($response['cep'])) {
            $data['zip_code'] = $response['cep'];
        }

        if (!empty($response['state'])) {
            $data['state'] = $response['state'];
        }

        if (!empty($response['city'])) {
            $data['city'] = $response['city'];
        }

        if (!empty($response['neighborhood'])) {
            $data['neighborhood'] = $response['neighborhood'];
        }

        if (!empty($response['street'])) {
            $data['street'] = $response['street'];
        }

        return $this->model::create($data);
    }

    public function find($id)
    {
        $response = $this->model::find($id);
        if (!$response) {
            throw new BusinessException('Cliente não encontrado.');
        }
        return $response;
    }

    public function update($id,array $data)
    {
        $response = $this->find($id);

        if ($data['zip_code'] !== $response->zip_code) {
            if (!empty($response['zip_code)'])) {
                $data['zip_code'] = $response['cep'];
            }
    
            if (!empty($response['state'])) {
                $data['state'] = $response['state'];
            }
    
            if (!empty($response['city'])) {
                $data['city'] = $response['city'];
            }
    
            if (!empty($response['neighborhood'])) {
                $data['neighborhood'] = $response['neighborhood'];
            }
    
            if (!empty($response['street'])) {
                $data['street'] = $response['street'];
            }
        }

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