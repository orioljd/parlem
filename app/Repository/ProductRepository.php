<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    public function productsbyCustomer(string $customerId = null)
    {
        $product = Product::orderBy('productName');

        if ($customerId) {
            $product->where('customerId', $customerId);
        }

        return $product->get();
    }
}
