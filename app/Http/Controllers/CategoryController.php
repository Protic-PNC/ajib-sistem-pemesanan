<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
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
}
