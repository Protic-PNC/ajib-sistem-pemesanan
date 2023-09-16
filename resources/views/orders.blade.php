@extends('layouts.order-layout')

@section('content')
    <div class="order-section">
        <div class="product-item">
            <div class="product-image">
                <img src="https://example.com/product-image.jpg" alt="Product Image">
            </div>
            <div class="product-details">
                <h3 class="product-name">Galon Standar</h3>
                <p class="product-price">Rp. 7000</p>
            </div>
            <div class="product-action">
                <button class="edit">Edit</button>
                <button class="hapus">Hapus</button>
                <button class="pesan">Pesan</button>
            </div>
        </div>
    </div>
@endsection
