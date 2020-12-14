<?php

namespace App\Repository;

use App\Models\Customer;

class CustomerRepository
{
    public function customers()
    {
        return Customer::all();
    }
}
