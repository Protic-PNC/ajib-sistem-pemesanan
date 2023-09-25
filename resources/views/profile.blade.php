@extends('layouts.profile-layout')
@section('content')
    <div class="edit-icon">
        <img src="{{ Vite::asset('resources/images/edit-icon.svg') }}" alt="edit-icon">
    </div>
    <div class="title-profile">
        <img src="{{ Vite::asset('resources/images/ajib-logo.png') }}" alt="profile-image">
        <div class="name-phone">
            <h2 class="name-profile">Adrian Ramadhan</h2>
            <p class="phone-number">0882 2529 2279</p>
        </div>
    </div>
    <div class="info-section">
        <h4 style="text-align: left">Informasi Akun</h4>
        <div class="cabang">
            <div class="key-section">
                <p class="key">Cabang</p>
                <p class="value-section">Cabang</p>
            </div>
        </div>
        <div class="alamat-rumah">
            <div class="key-section">
                <p class="key">Alamat Rumah</p>
                <p class="value-section">JL. Rinjani No.51, Sidanegara Cilacap Tengah, Cilacap</p>
            </div>
        </div>
        <div class="foto-rumah">
            <div class="key-section">
                <p class="key">Foto Rumah</p>
                <p style="color: #3686ff" class="value-section">Lihat</p>
            </div>
        </div>
    </div>

    <button class="button-logout">
        LOGOUT
    </button>
@endsection
