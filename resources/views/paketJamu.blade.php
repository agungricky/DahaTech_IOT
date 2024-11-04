@extends('main')
@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Beli Jamu</a>
        </div>

        <div class="cards">
            <div class="card">
                <div class="profile_jamu">
                    <img src="{{ asset('Assets/img/jamu.jpg') }}" alt="Profile Jamu">
                </div>
                <div class="keterangan">
                    <h3>Jamu Beras Kencur</h3>
                    <p>Dapat menyembuhkan Penyakit apapun</p>
                </div>
                <div class="button">
                    <a href=""><i class="bi bi-cart-check-fill"></i> Beli</a>
                </div>
            </div>
            <div class="card">
                <div class="profile_jamu">
                    <img src="{{ asset('Assets/img/jamu.jpg') }}" alt="Profile Picture">
                </div>
                <div class="keterangan">
                    <h3>Jamu Beras Kencur</h3>
                    <p>Dapat menyembuhkan Penyakit apapun</p>
                </div>
                <div class="button">
                    <a href=""><i class="bi bi-cart-check-fill"></i> Beli</a>
                </div>
            </div>
            <div class="card">
                <div class="profile_jamu">
                    <img src="{{ asset('Assets/img/jamu.jpg') }}" alt="Profile Picture">
                </div>
                <div class="keterangan">
                    <h3>Jamu Beras Kencur</h3>
                    <p>Dapat menyembuhkan Penyakit apapun</p>
                </div>
                <div class="button">
                    <a href=""><i class="bi bi-cart-check-fill"></i> Beli</a>
                </div>
            </div>
            <div class="card">
                <div class="profile_jamu">
                    <img src="{{ asset('Assets/img/jamu.jpg') }}" alt="Profile Picture">
                </div>
                <div class="keterangan">
                    <h3>Jamu Beras Kencur</h3>
                    <p>Dapat menyembuhkan Penyakit apapun</p>
                </div>
                <div class="button">
                    <a href=""><i class="bi bi-cart-check-fill"></i> Beli</a>
                </div>
            </div>
        </div>
    </div>
@endsection
