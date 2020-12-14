<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = new ProductRepository();

        return $products->productsbyCustomer($request->get('customer'));
    }
}
