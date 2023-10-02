<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "product_id" => "required|integer",
            "qty" => "required|integer"
        ]);

        /** @var \App\Models\User */
        $user = auth()->user();

        $product = $this->productService->getProductById(
            $user->detailConsumer->branch_id,
            $data["product_id"]
        );
        if (!$product) return throw new InvariantException("Product yang dipilih tidak valid!");

        \Cart::session($user->id);

        \Cart::add([
            'id' => $product["id"],
            'name' => $product["name"],
            'price' => $product["harga"],
            'quantity' => $data["qty"],
            'attributes' => array(),
            'associatedModel' => $product
        ]);

        $cartItemsCount = \Cart::getContent()->count();

        return response()->json(["count" => $cartItemsCount]);
    }

    public function destroy($id)
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        \Cart::session($user->id);
        if (!\Cart::get($id)) throw new InvariantException("Item tidak ditemukan pada keranjang!");

        \Cart::remove($id);
        $cartItemsCount = \Cart::getContent()->count();

        return response()->json(["count" => $cartItemsCount]);
    }
}
