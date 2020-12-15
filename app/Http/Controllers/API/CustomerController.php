<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repository\CustomerRepository;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = new CustomerRepository();

        return $customers->customers();
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

}
