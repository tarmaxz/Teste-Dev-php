<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller {

    protected CustomerRepository $customerRepository;

    public function __construct(
        CustomerRepository $customerRepository,
    ) {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        try {
            $response = $this->customerRepository->list(request()->all());
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

    public function store(CustomerRequest $request)
    {
        try {
            $response = $this->customerRepository->create($request->all());
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->customerRepository->update($request->all(),$id);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->customerRepository->delete($id);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

}