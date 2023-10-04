<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/welcome-ajib.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ Vite::asset('resources/images/ajib-logo-welcome.png') }}" alt="ajib-logo">
            <h1 class="header-title">AJIB DARKAH</h1>
        </div>
        <div class="copywriting-section">
            Ajib Darkah adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio consequatur repellat dolorum! Ex, sunt consequuntur molestias rem similique asperiores porro.
        </div>
        <a href="/category"> <button class="button-masuk">
                Masuk</button></a>

    </div>
</body>

</html>
