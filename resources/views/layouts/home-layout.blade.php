@php
    use Illuminate\Support\Facades\Vite;
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/home-layout.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="padding-top: 7vh; color: floralwhite">KATEGORI PRODUK</h1>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <div class="navigation">
        <a href="/category"><img style="width: 24px;" src="{{ Vite::asset('resources/images/home-active.svg') }}"
                alt="home"></a>
        <a href="/cart"><img style="width: 24px" src="{{ Vite::asset('resources/images/order.svg') }}"
                alt="message"></a>
        <a href="/profile"><img style="width: 24px" src="{{ Vite::asset('resources/images/profile.svg') }}"
                alt="profile"></a>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
