<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function listProduct()
    {
        $response = Http::withToken(env('BEARER_TOKEN'))->get('http://sso-ajib-dev.protic.web.id/api/product');

        if ($response->successful()) {
            $products = $response->json()['data'];
        } else {
            $products = [];
        }

        return view('products', compact('products'));
    }
}
