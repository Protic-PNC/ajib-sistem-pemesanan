<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/profile-layout.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="padding-top: 7vh; color: floralwhite">Profile Anda</h1>
        </div>
    </div>

    <div class="navigation">
        <a href="/category"><img style="width: 24px" src="{{ Vite::asset('resources/images/home.svg') }}"
                alt="home"></a>
        <a href="/orders"><img style="width: 24px" src="{{ Vite::asset('resources/images/order.svg') }}"
                alt="message"></a>
        <a href="/profile"><img style="width: 24px" src="{{ Vite::asset('resources/images/profile-active.svg') }}"
                alt="profile"></a>
    </div>
</body>

</html>
