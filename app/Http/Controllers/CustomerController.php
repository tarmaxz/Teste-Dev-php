<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;
use App\Exceptions\BusinessException;


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
            $response = $this->customerRepository->all(request()->all());
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

    public function store(CustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $response = $this->customerRepository->create($request->all());
            DB::commit();
            return response()->json($response);
        } catch (BusinessException $e) {
            return $this->responseError($e->getMessage());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

    public function update($id, CustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $response = $this->customerRepository->update($id, $request->all());
            DB::commit();
            return response()->json($response);
        } catch (BusinessException $e) {
            return $this->responseError($e->getMessage());
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
        } catch (BusinessException $e) {
            return $this->responseError($e->getMessage());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

}