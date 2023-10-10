@section('title', 'Pesanan')
<div>
    <div class="grid grid-cols-1 gap-3">
        @forelse ($orders as $order)
        <a href="{{ route('detail.orders', ['id' => $order->id]) }}" class="p-3 border shadow-lg rounded-lg">
            <div class="flex gap-x-4">
                <div class="flex-grow">
                    <img class="w-20" src="{{ $productImage($order->detailOrder()->first()->produk_id) }}" alt="" srcset="">
                </div>
                <div class="w-full">
                    <p class="font-semibold">{{ $order->detailOrder()->first()->nama_produk }}</p>
                    <div class="flex justify-between w-full">
                        <div class="flex items-end h-10">
                            <p class="text-blue-500 font-semibold">{{ Str::ucfirst($order->status) }}</p>
                        </div>
                        <div>
                            <p class="text-sm">Antrian {{ $order->no_order }}</p>
                            <p class="text-xs">{{ $order->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <p>Tidak ada Pesanan</p>
        @endforelse
    </div>

</div>
