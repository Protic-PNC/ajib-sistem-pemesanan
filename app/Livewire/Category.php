<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Category extends Component
{
    public $categories;

    public function mount()
    {
        $res = Http::withToken(env('BEARER_TOKEN'))->get(env('SSO_URL').'/category');

        if ($res->successful()) {
            $this->categories = $res->json()['data'];
        } else {
            $this->categories = [];
        }
    }

    public function render()
    {
        return view('livewire.category');
    }
}
