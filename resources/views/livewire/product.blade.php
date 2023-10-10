<div>
    <div class="mb-3 flex items-center">
        <a href="{{ route('home') }}" class="text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
        </a>
        <p class="font-bold text-blue-500 text-xl ms-3">Produk {{ Str::ucfirst(Str::replace('-', ' ', $category)) }}</p>
    </div>
    <div class="grid grid-cols-2 gap-6">
        @forelse ($products as $product)
        <a href="{{ route('product.detail', ['category' => $category, 'product' => $product['slug']]) }}" class="border rounded-xl shadow-lg p-3">
            <div class="px-4">
                <img src="{{ $product['images'][0]['image'] }}" alt="" srcset="">
            </div>
            <div class="mt-2">
                <p class="font-semibold">{{ $product['name'] }}</p>
                <p class="mt-1 text-blue-500 text-xs">Rp {{ number_format($product['harga'], 2, '.', ',') }}</p>
            </div>
        </a>
        @empty
        <p>Tidak ada Produk</p>
        @endforelse
    </div>
</div>
