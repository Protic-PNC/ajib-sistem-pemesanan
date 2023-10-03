@extends('layouts.profile-layout')
@section('content')
    <div class="edit-icon">
        <img src="{{ Vite::asset('resources/images/edit-icon.svg') }}" alt="edit-icon">
    </div>
    <div class="title-profile">
        <img src="{{ Vite::asset('resources/images/ajib-logo.png') }}" alt="profile-image">
        <div class="name-phone">
            <h2 class="name-profile">{{ auth()->user()->name }}</h2>
            <p class="phone-number">{{ auth()->user()->detailConsumer->no_hp }}</p>
        </div>
    </div>
    <div class="info-section">
        <h4 style="text-align: left">Informasi Akun</h4>
        <div class="cabang">
            <div class="key-section">
                <p class="key">Cabang</p>
                <p class="value-section">{{ auth()->user()->detailConsumer->branch_name }}</p>
            </div>
        </div>
        <div class="alamat-rumah">
            <div class="key-section">
                <p class="key">Alamat Rumah</p>
                <p class="value-section">
                    {{ auth()->user()->detailConsumer->alamat }}
                    Rt {{ auth()->user()->detailConsumer->rt }}/Rw {{ auth()->user()->detailConsumer->rw }},
                    {{ auth()->user()->detailConsumer->kelurahan }},
                    Kec {{ auth()->user()->detailConsumer->kecamatan }},
                    {{ auth()->user()->detailConsumer->kabupaten }}. ({{ auth()->user()->detailConsumer->kode_pos }})
                </p>
            </div>
        </div>
        <div class="foto-rumah">
            <div class="key-section">
                <p class="key">Foto Rumah</p>
                <p style="color: #3686ff" class="value-section">Lihat</p>
            </div>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="button-logout">
            LOGOUT
        </button>
    </form>
@endsection
