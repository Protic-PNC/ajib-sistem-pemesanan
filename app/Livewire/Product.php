<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Product extends Component
{
    public $products;
    public $category;

    public function mount($category)
    {
        $this->category = $category;
        $res = Http::withToken(env('BEARER_TOKEN'))->get(env('SSO_URL').'/product/category', [
            'branch' => auth()->user()->detailConsumer->branch_id,
            'slug' => $category
        ]);

        if ($res->successful()) {
            $this->products = $res->json()['data'];
        } else {
            $this->products = [];
        }
    }

    public function render()
    {
        return view('livewire.product');
    }
}
