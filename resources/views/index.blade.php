@extends('main')
@section('content')
    <div class="container" id="loading_sc">
        <img class="logo" src="{{ asset('public/Assets/img/—Pngtree—nature herbal logo_8422875.png') }}" alt="logo">
        <div id="loading">
            <span class="dot">•</span>
            <span class="dot">•</span>
            <span class="dot">•</span>
            <span class="dot">•</span>
            <span class="dot">•</span>
            <span class="dot">•</span>
        </div>

        <div class="hijau"></div>
        <div class="putih"></div>
        <p id="slogan">Temukan solusi kesehatan anda dengan <br> jamu tradsional</p>
    </div>

    <div class="main" style="display: none;">
        <div class="container">
            <img class="logo" src="{{ asset('/Assets/img/—Pngtree—nature herbal logo_8422875.png') }}" alt="">

            <div class="menu">
                <button id="btnKonsultasi"><i class="bi bi-headset"></i> Konsultasi</button>
                <button id="btnBeliJamu"><i class="bi bi-cart-check-fill"></i> Beli Jamu</button>
                <p id="slogan">Temukan solusi kesehatan anda dengan <br> jamu tradsional</p>
            </div>
        </div>
    </div>
@endsection
