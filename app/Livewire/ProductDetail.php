<?php

namespace App\Livewire;

use App\Models\DetailOrder;
use App\Models\Order;
use Http;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;

    public $quantity = 1;

    public function mount($category, $product)
    {
        $res = Http::withToken(env('BEARER_TOKEN'))->get(env('SSO_URL').'/product', [
            'branch' => auth()->user()->detailConsumer->branch_id,
            'slug' => $product
        ]);

        if ($res->successful()) {
            $this->product = $res->json()['data'][0];
        } else {
            $this->product = [];
        }
    }

    #[On('quantityUpdated')]
    public function updateQty($quantity)
    {
        $this->quantity = $quantity;
    }

    public function buy()
    {
        $noOrder = Order::where('created_at', '>=', today())->orderBy('created_at', 'DESC')->first();
        if($noOrder) {
            $noOrder = $noOrder->no_order + 1;
        } else {
            $noOrder = 1;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'no_order' => $noOrder,
            'status' => 'mengantri',
            'cart' => false
        ]);

        DetailOrder::create([
            'order_id' => $order->id,
            'produk_id' => $this->product['id'],
            'nama_produk' => $this->product['name'],
            'quantity' => $this->quantity,
            'harga' => $this->product['harga']
        ]);

        return redirect()->route('orders');
    }

    public function cart()
    {
        $checkCart = Order::where('user_id', auth()->user()->id)->where('cart', true)->first();

        if($checkCart) {
            $order = $checkCart;
        } else {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'no_order' => 0,
                'status' => 'mengantri',
                'cart' => true
            ]);
        }

        DetailOrder::create([
            'order_id' => $order->id,
            'produk_id' => $this->product['id'],
            'nama_produk' => $this->product['name'],
            'quantity' => $this->quantity,
            'harga' => $this->product['harga']
        ]);

        return redirect()->route('carts');
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
