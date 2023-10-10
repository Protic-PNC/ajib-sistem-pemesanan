@push('styles')
<link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
@endpush

<div>
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach ($product['images'] as $image)
                <div class="swiper-slide flex justify-center">
                    <img class="w-full" src="{{ $image['image'] }}"  alt="{{ $product['name'] }}" />
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <div class="py-4 border-b">
        <p class="font-semibold text-xl">{{ $product['name'] }}</p>
        <p class="mt-2 text-blue-500">Rp {{ number_format($product['harga'], 2, '.', ',') }}</p>
    </div>

    <form wire:submit="buy" class="mt-4">
        <div class="flex justify-end">
            <div class="flex items-center space-x-3">
                <button @click="decrement" class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Quantity button</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                    </svg>
                </button>
                <div>
                    <input type="number" value="1" id="quantity" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <button @click="increment" class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Quantity button</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 mt-4">
            <div class="flex-grow">
                <button type="button" wire:click="cart" class="text-white flex justify-center w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Keranjang</span>
                </button>
            </div>
            <div class="flex-grow">
                <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Beli</button>
            </div>
        </div>

        <div wire:loading wire:target="buy">
            <div class="w-full h-full top-0 left-0 absolute z-20 bg-[#00000055]">
                <div class="flex justify-center items-center w-full h-full">
                    <p class="text-white">Tunggu Sebentar...</p>
                </div>
            </div>
        </div>
    </form>

    <div>
        <p class="font-semibold">Deskripsi</p>
        <p>{{ $product['description'] }}</p>
    </div>

</div>

@push('scripts')
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.swiper', {
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const quantity = document.getElementById('quantity');
    let value = parseInt(quantity.value);

    function decrement(e) {
        if (value > 1) {
            value = quantity.value = value - 1;
        }
        Livewire.dispatch('quantityUpdated', { 'quantity': value});
    }

    function increment(e) {
        value = quantity.value = value + 1;

        Livewire.dispatch('quantityUpdated', { 'quantity': value});
    }

</script>
@endpush
