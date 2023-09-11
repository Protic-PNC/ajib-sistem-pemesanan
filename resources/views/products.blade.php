<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <style>
        /* Gaya umum */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Gaya mobile dan desktop */
        .container {
            width: 100%;
            padding: 10px;
            text-align: center;
            max-width: 480px;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 16px;
        }

        img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .navigation {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            text-align: center;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selamat Datang di Ajib Darkah Web</h1>
        <div class="list-product">
            <h2>Daftar Produk</h2>
            <ul class="product-list">
                @foreach ($products as $product)
                    <li>{{ $product['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="navigation">
        <a href="#">Beranda</a> |
        <a href="#">Tentang</a> |
        <a href="#">Kontak</a>
    </div>
</body>

</html>
