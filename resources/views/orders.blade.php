<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<style>
    * {
        font-family: 'poppins', sans-serif;
    }

    .container {
        width: 100%;
        padding: 10px;
        text-align: center;
        max-width: 480px;
        margin: 0 auto;
    }

    .navigation {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 480px;
        background-color: #3686FF;
        text-align: center;
        padding: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        z-index: 999;
        display: flex;
        justify-content: space-evenly;
    }

    .order-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .product-item {
        display: flex;
        align-items: center;
        background-color: #3686FF;
        padding: 10px;
        border-radius: 5px;
    }

    .product-image img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }

    .product-details {
        flex-grow: 1;
        margin-left: 10px;
    }

    .product-name {
        text-align: left;
        font-size: 18px;
        font-weight: bold;
        margin-right: 15px;
        color: #ffffff
    }

    .product-price {
        font-size: 16px;
        color: #FFD075;
        text-align: left;
    }

    .product-action {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .product-action .pesan {
        width: 70px;
        padding: 5px 10px;
        background-color: #4caf50;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .product-action .edit {
        width: 70px;
        padding: 5px 10px;
        background-color: #FFDC27;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .product-action .hapus {
        width: 70px;
        padding: 5px 10px;
        background-color: #FC4343;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .product-action .pesan:hover {
        background-color: #45a049;
    }
</style>

<body>
    <div class="container">
        <h1>Pesanan Anda</h1>

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
    </div>

    <div class="navigation">
        <a href="/category"><img style="width: 24px" src="{{ asset('images/home.svg') }}" alt="home"></a>
        <a href="/orders"><img style="width: 24px" src="{{ asset('images/order-active.svg') }}" alt="message"></a>
        <a href="#"><img style="width: 24px" src="{{ asset('images/profile.svg') }}" alt="profile"></a>
    </div>
</body>

</html>
