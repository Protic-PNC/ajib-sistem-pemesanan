<div class="grid grid-cols-2 gap-6">
    @forelse ($categories as $category)
    <a href="{{ route('product', ['category' => $category['slug']]) }}" class="border rounded-xl shadow-lg p-3">
        <div class="px-4">
            <img src="{{ $category['images'][0]['image'] }}" alt="" srcset="">
        </div>
        <div class="mt-2 text-center">
            <p class="font-semibold">{{ $category['name'] }}</p>
        </div>
    </a>
    @empty
    <p>Tidak ada data kategori</p>
    @endforelse

</div>
