<?php

namespace App\Livewire;

use Livewire\Component;

class Carts extends Component
{
    public function render()
    {
        $carts = auth()->user()->orders()->where('cart', true)->first()->detailOrder()->get();

        return view('livewire.carts', [
            'carts' => $carts
        ]);
    }
}
