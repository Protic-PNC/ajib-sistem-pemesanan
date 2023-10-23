@section('title', 'Profil')
<div>
    <div class="flex gap-6 mt-4">
        <img class="rounded-full w-20 h-20" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=Nafis Watsiq" alt="">
        <div class="flex-grow flex h-20 items-center">
            <div>
                <p class="font-bold text-lg text-gray-800">Nafis Watsiq Amrulloh</p>
                <p class="text-gray-500">amrullohnafis@gmail.com</p>
            </div>
        </div>
    </div>

    <div class="border rounded-xl shadow py-4 mt-10 grid grid-flow-row">
        <div class="flex border-b justify-between px-6 py-3">
            <div>
                <p class="text-gray-500">Cabang</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->branch_name }}</p>
            </div>
        </div>
        <div class="flex border-b justify-between px-6 py-3">
            <div>
                <p class="text-gray-500">No Hp</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->no_hp }}</p>
            </div>
        </div>
        <div class="flex border-b justify-between px-6 py-3">
            <div>
                <p class="text-gray-500">Kabupaten</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->kabupaten }}</p>
            </div>
        </div>
        <div class="flex border-b justify-between px-6 py-3">
            <div>
                <p class="text-gray-500">Kecamatan</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->kecamatan }}</p>
            </div>
        </div>
        <div class="flex border-b justify-between px-6 py-3">
            <div>
                <p class="text-gray-500">Kelurahan</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->kelurahan }}</p>
            </div>
        </div>
        <div class="px-6 py-3">
            <div>
                <p class="text-gray-500">Alamat</p>
            </div>
            <div>
                <p class="">{{ auth()->user()->detailConsumer->alamat }}</p>
                <p>Rt {{ auth()->user()->detailConsumer->rt }}/{{ auth()->user()->detailConsumer->rw }}</p>
                <p>Kode Pos ({{ auth()->user()->detailConsumer->kode_pos }})</p>
            </div>
        </div>
    </div>

    <div class="flex gap-6">
        <a href="" class="bg-blue-500 text-white rounded-lg px-6 py-2 mt-6 w-full text-center">Edit Profil</a>
        <a href="{{ route('keluar') }}" class="bg-red-500 text-white rounded-lg px-6 py-2 mt-6 w-full text-center">Logout</a>
    </div>
</div>
