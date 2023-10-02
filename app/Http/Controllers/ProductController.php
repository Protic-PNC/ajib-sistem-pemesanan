<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function listProduct()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        $products = $this
            ->productService
            ->getProducts($user->detailConsumer->branch_id);

        return view('products', compact('products'));
    }
}
