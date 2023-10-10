<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class DetailOrders extends Component
{
    public function mount($id)
    {
        $order = Order::find($id);
    }

    public function render()
    {
        return view('livewire.detail-orders');
    }
}
