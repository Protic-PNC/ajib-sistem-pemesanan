<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/category.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="/category"><img style="width: 36px;" src="{{ Vite::asset('resources/images/arrow-icon.svg') }}"
                    alt="back"></a>
            <h1 style=" color: floralwhite">GALON</h1>
        </div>
        @foreach ($products as $product)
            <div class="card">
                <h1 style="color: #3686FF; text-align: left">{{ $product['name'] }}</h1>
                <div class="product-image">
                    <img style="400px" src="{{ $product['image'] }}" alt="product-image">
                </div>
                <div class="cart-section">
                    <div class="cart-number">
                        <img src="{{ Vite::asset('resources/images/plus-icon.svg') }}" alt="plus">
                        <div class="cart-amount">
                            <p>1</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/minus-icon.svg') }}" alt="minus">
                    </div>
                    <div class="cart-button">
                        <a href="/orders"> <button class="button-tambah">
                                Tambahkan</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
