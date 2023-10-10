<?php

namespace App\Livewire;

use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $orders = auth()->user()->orders()->where('cart', false)->orderBy('created_at', 'DESC')->get();

        return view('livewire.orders', [
            'orders' => $orders
        ]);
    }
}
