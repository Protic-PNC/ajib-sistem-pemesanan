<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    <!-- category.blade.php -->

    <!-- category.blade.php -->

    <div class="container">
        {{-- <h1>{{ $category['name'] }}</h1> --}}
        <h1>test</h1>
        <div class="list-products">
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{ $product['images'][0]['image'] }}" alt="{{ $product['name'] }}">
                    <div class="card-content">
                        <p>{{ $product['name'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
