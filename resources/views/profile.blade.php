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
        margin: 0px;
    }

    .container {
        width: 100%;
        /* padding: 10px; */
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

    .header {
        height: 15vh;
        background: linear-gradient(to bottom right, #84b8ca, #0748A9);
        margin-top: 0px;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h1 style="padding-top: 7vh; color: floralwhite">Profile Anda</h1>
        </div>
    </div>

    <div class="navigation">
        <a href="/category"><img style="width: 24px" src="{{ asset('images/home.svg') }}" alt="home"></a>
        <a href="/orders"><img style="width: 24px" src="{{ asset('images/order.svg') }}" alt="message"></a>
        <a href="/profile"><img style="width: 24px" src="{{ asset('images/profile-active.svg') }}" alt="profile"></a>
    </div>
</body>

</html>
