<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
    rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/complete-layout.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="header">LENGKAPI DATA DIRI</h1>
        <form action="{{ route('complete-data.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-container">
                <h5 class="input-title">Kabupaten*</h5>
                <div class="input-field">
                    <input type="text" placeholder="Kabupaten" name="kabupaten" required style="outline: none">
                </div>
            </div>
            <div class="input-container">
                <h5 class="input-title">Kecamatan*</h5>
                <div class="input-field">
                    <input type="text" placeholder="Kecamatan" name="kecamatan" required style="outline: none">
                </div>
            </div>
            <div class="input-container" style="display: flex; width: 85%">
                <div class="input-kelurahan">
                    <h5 class="input-title">Kelurahan*</h5>
                    <div class="input-field">
                        <input type="text" placeholder="Kelurahan" name="kelurahan" required style="outline: none">
                    </div>
                </div>
                <div class="input-rt">
                    <h5 class="input-title">RT*</h5>
                    <div class="input-field">
                        <input type="text" placeholder="RT" name="rt" required style="outline: none">
                    </div>
                </div>
                <div class="input-rw">
                    <h5 class="input-title">RW*</h5>
                    <div class="input-field">
                        <input type="text" placeholder="RW" name="rw" required style="outline: none">
                    </div>
                </div>
            </div>
            <div class="input-container" style="display: flex; width: 85%">
                <div class="input-jalan">
                    <h5 class="input-title">Jalan*</h5>
                    <div class="input-field">
                        <input type="text" placeholder="Jalan" name="alamat" required style="outline: none">
                    </div>
                </div>
                <div class="input-kode-pos">
                    <h5 class="input-title">Kode Pos*</h5>
                    <div class="input-field">
                        <input type="text" placeholder="Kode Pos" name="kode_pos" required style="outline: none">
                    </div>
                </div>
            </div>
            <div class="input-container">
                <h5 class="input-title">Nomor HP*</h5>
                <div class="input-field">
                    <input type="text" placeholder="Nomor HP" name="no_hp" required style="outline: none">
                </div>
            </div>
            <div class="input-container">
                <h5 class="input-title">Cabang*</h5>
                <div class="input-field">
                    <select id="cabangDropdown" name="branch_id" required style="outline: none">
                        <option value="">Pilih Cabang</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch['id'] }}">{{ $branch['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="input-container">
                <h5 class="input-title">Foto Rumah*</h5>
                <div class="input-field">
                    <div class="input-file">
                        <input type="file" id="file-input" name="foto_rumah" required style="outline: none" onchange="updateFileName()">
                        <img src="{{ Vite::asset('resources/images/upload-icon.svg') }}" alt="upload-icon">
                        <br>
                        <label for="file-input" id="file-label">Pilih File</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="button-lanjut">Lanjut</button>
        </form>
    </div>

    <script>
        function updateFileName() {
            var fileInput = document.getElementById('file-input');
            // Get the selected file name
            var fileName = fileInput.files[0].name;

            // Update the file label with the selected file name
            var fileLabel = document.getElementById('file-label');
            fileLabel.innerHTML = fileName;
        }
    </script>
</body>

</html>
