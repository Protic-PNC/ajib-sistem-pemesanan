<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/complete-layout.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="header">LENGKAPI DATA DIRI</h1>
        <div class="input-container">
            <h5 class="input-title">Kabupaten*</h5>
            <div class="input-field">
                <input type="text" placeholder="Kabupaten">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Kecamatan*</h5>
            <div class="input-field">
                <input type="text" placeholder="Kecamatan">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Kelurahan*</h5>
            <div class="input-field">
                <input type="text" placeholder="Kelurahan">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Jalan*</h5>
            <div class="input-field">
                <input type="text" placeholder="Jalan">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Nomor HP*</h5>
            <div class="input-field">
                <input type="text" placeholder="Nomor HP">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Cabang*</h5>
            <div class="input-field">
                <input type="text" placeholder="Cabang">
            </div>
        </div>
        <div class="input-container">
            <h5 class="input-title">Foto Rumah*</h5>
            <div class="input-field">
                <div class="input-file">
                    <input type="file" id="file-input">
                    <img src="{{ Vite::asset('resources/images/upload-icon.svg') }}" alt="upload-icon">
                    <br>
                    <label for="file-input">Pilih File</label>
                </div>
            </div>
        </div>

        <button class="button-lanjut">Lanjut</button>
    </div>
</body>

<script></script>

</html>
