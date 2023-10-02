<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {
    }

    public function listCategory()
    {
        $response = Http::withToken(env('BEARER_TOKEN'))->get('https://sso-ajib-dev.protic.web.id/api/category');

        if ($response->successful()) {
            $categories = $response->json()['data'];
        } else {
            $categories = [];
        }

        return view('categories', compact('categories'));
    }

    public function showCategory($slug)
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $products = $this
            ->productService
            ->getProductsByCategory($user->detailConsumer->branch_id, $slug);

        return view('category', compact('products'));
    }
}
