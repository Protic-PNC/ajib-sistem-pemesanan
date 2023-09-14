<!DOCTYPE html>
<html>

<head>
    <title>Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

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

        /* img {
          width: 100%;
          height: auto;
          margin-bottom: 20px;
        } */

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

        @media (max-width: 480px) {
            .container {
                max-width: 100%;
            }

            .navigation {
                width: 100%;
                max-width: 480px;
                left: 0;
                transform: none;
            }
        }

        .list-category {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .category-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
            margin: 0px;
            padding: 0px;
        }

        .list-category {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: #f2f2f2;
            /* padding: 10px; */
            margin: 10px;
            text-align: center;
            width: calc(50% - 20px);
            /* Lebar 50% dengan jarak margin 10px */
            box-sizing: border-box;
            border-radius: 8px;
        }

        .card-content {
            background-color: #3686FF;
            padding: 10px;
            border-radius: 0 0 8px 8px;
        }

        .card img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            margin-top: 2px;
            margin-bottom: 0;
            color: #fff;
            /* Mengatur warna teks menjadi putih */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kategori Produk</h1>
        <div class="list-category">
            @foreach ($categories as $category)
                <div class="card">
                    <img src="{{ $category['images'][0]['image'] }}" alt="{{ $category['name'] }}">
                    <div class="card-content">
                        <a href="{{ url('category', ['slug' => $category['slug']]) }}">
                            <p>{{ $category['name'] }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="navigation">
        <a href="/category"><img style="width: 24px" src="{{ asset('images/home-active.svg') }}" alt="home"></a>
        <a href="/orders"><img style="width: 24px" src="{{ asset('images/order.svg') }}" alt="message"></a>
        <a href="#"><img style="width: 24px" src="{{ asset('images/profile.svg') }}" alt="profile"></a>
    </div>
</body>

</html>
