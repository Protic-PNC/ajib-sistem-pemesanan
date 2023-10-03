<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/category.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="/category"><img style="width: 36px;" src="{{ Vite::asset('resources/images/arrow-icon.svg') }}"
                    alt="back"></a>
            <h1 style=" color: floralwhite">GALON</h1>
        </div>
        @foreach ($products as $product)
            <div class="card">
                <h1 style="color: #3686FF; text-align: left">{{ $product['name'] }}</h1>
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($product['images'] as $image)
                            <div class="swiper-slide">
                                <img src="  {{ $image['image'] }}" alt="{{ $product['name'] }}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="cart-section">
                    <div class="cart-number">
                        <button type="button" id="btnIncr">
                            <img src="{{ Vite::asset('resources/images/plus-icon.svg') }}" alt="plus">
                        </button>
                        <div class="cart-amount">
                            <p id="amtDisplay">1</p>
                            <input type="text" hidden value="1" id="amtInput">
                        </div>
                        <button type="button" id="btnDecr">
                            <img src="{{ Vite::asset('resources/images/minus-icon.svg') }}" alt="minus">
                        </button>
                    </div>
                    <div class="cart-button">
                        <button type="button" class="button-tambah">Tambahkan</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        const incrEl = document.getElementById("btnIncr");
        const decrEl = document.getElementById("btnDecr");
        const amtDisplayEl = document.getElementById("amtDisplay");
        const amtInput = document.getElementById("amtInput");

        function updateAmount(n = 1) {
            let val = +amtInput.value + n;

            amtInput.value = val < 1 ? amtInput.value : val;
            amtDisplayEl.textContent = amtInput.value;
        }

        incrEl.addEventListener("click", () => updateAmount());
        decrEl.addEventListener("click", () => updateAmount(-1));

        const btnAddToCart = document.querySelector(".button-tambah");
        btnAddToCart.addEventListener("click", async function() {
            let originalText = this.textContent;

            try {
                this.disabled = true;
                this.innerHTML =
                    `<svg width="24" height="24" stroke="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_V8m1{transform-origin:center;animation:spinner_zKoa 2s linear infinite}.spinner_V8m1 circle{stroke-linecap:round;animation:spinner_YpZS 1.5s ease-in-out infinite}@keyframes spinner_zKoa{100%{transform:rotate(360deg)}}@keyframes spinner_YpZS{0%{stroke-dasharray:0 150;stroke-dashoffset:0}47.5%{stroke-dasharray:42 150;stroke-dashoffset:-16}95%,100%{stroke-dasharray:42 150;stroke-dashoffset:-59}}</style><g class="spinner_V8m1"><circle cx="12" cy="12" r="9.5" fill="none" stroke-width="3"></circle></g></svg>`

                let data = {
                    _token: `{{ csrf_token() }}`,
                    product_id: {{ $product['id'] }},
                    qty: +amtInput.value
                }

                const res = await fetch(`{{ route('cart.store') }}`, {
                    method: "POST",
                    headers: {
                        "accept": "application/json",
                        "content-type": "application/json",
                    },
                    body: JSON.stringify(data),
                    credentials: "same-origin"
                })

                if (!res.ok) {
                    throw new Error("Terjadi kesalahan di sisi server.");
                }

                Swal.fire({
                    icon: 'success',
                    text: 'Produk berhasil ditambahkan ke dalam keranjang!',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } catch (e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: e.message
                })
            } finally {
                this.disabled = false;
                this.textContent = originalText;
            }
        });
    </script>
</body>

</html>
