<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Customers\CustomersRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    protected CustomersRepository $customersRepository;

    public function __construct(
        CustomersRepository $customersRepository,
    ) {
        $this->customersRepository = $customersRepository;
    }

    public function index(Request $request)
    {
        try {
            $response = $this->customersRepository->index($request->all());
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError("Erro, não foi possível realizar a ação");
        }
    }

}