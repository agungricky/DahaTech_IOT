@extends('main')
@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Konsultasi</a>
        </div>

        <div class="quesion">
            <div class="box">
                <h3>Jawab pertanyaan dibawah ini sesuai dengan yang anda rasakan saat ini</h3>
                <hr>
                <p>"Untuk mendapatkan resep jamu yang tepat, silahkan masukan keluhan sesuai dengan yang anda rasakan. kami
                    akan menyesuaikan racikan jamu berdasarkan kebutuhan anda untuk membantu meningkatkan kesehatan secara
                    alami"</p>
                <hr>

                @php
                    $penyakit = [
                        // Jahe
                        'masuk_angin' => 'Masuk Angin',
                        'mabuk_perjalanan' => 'Mabuk Perjalanan',
                        'kedinginan' => 'Kedinginan',
                        'sakit_kepala' => 'Sakit Kepala',
                        'mual_kemoterapi' => 'Mual akbiat komoterapi',
                        'kurang_nafsumakan' => 'Kurang Nafsu Makan',
                        'kelelahan' => 'Kelelahan',
                        'diare' => 'Diare',

                        // Beras Kencur
                        'tenggorokan_serak' => 'Tenggorokan Serak',
                        'radang_lambung' => 'Radang Lambung',
                        'batuk_dahak' => 'Batuk Berdahak',
                        'sakit_perut' => 'Sakit Perut',
                        'pusing' => 'Pusing',
                        'perut_kembung' => 'Perut Kembung',
                        'nyeri_haid' => 'Nyeri Haid',

                        'demam' => 'Demam',
                        'gangguan_hati' => 'Gangguan Hati',
                        'sembelit' => 'Sembelit',
                        'peluruh_haid' => 'Peluruh Haid',
                        'tombo_cekok' => 'Tombo Cekok',
                        
                        'influenza' => 'Influenza',
                        'gatal_kulit' => 'Gatal Kulit',
                        'sariawan' => 'Sariawan',
                        'panas_dalam' => 'Panas Dalam',
                        'radang_pencernaan' => 'Radang Pencernaan',
                        'kesehatan_lambung' => 'Kesehatan Lambung',
                        'terlamabat_haid' => 'Terlambat Haid',
                    ];
                @endphp

                <form action="{{ route('keluhan') }}" method="POST">
                    <div class="item">
                        @csrf
                        @foreach ($penyakit as $index => $item)
                            <div class="item_question">
                                <input type="checkbox" name="{{ $index }}" id="{{ $index }}" value="{{ $item }}">
                                <label for="{{ $index }}">{{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button class="button" type="submit">Selajutnya</button>
                </form>
            </div>
        </div>
    </div>
@endsection
