@extends('main')
@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Konsultasi</a>
        </div>

        <div class="detail_quesion">
            <div class="box">
                <h1>PROSES DIAGNOSA</h1>
                <hr>
                <p>"Dalam proses diagnosa ini anda akan ditanyai tentang gejala dari keluahan yang anda sampaikan
                    sebelumnya"</p>
                <hr>
            </div>

            <form action="{{ route('diagnosa') }}" method="POST">
                @csrf
                @php
                    $no = 1;

                    $data = [
                        'Masuk Angin' => ['Gejala Masuk angin yang muncul ?', 'Perut Kembung'],
                        'Mabuk Perjalanan' => [ 'Gejala Mabuk Perjalanan yang muncul ?', 'Mual', 'Muntah', 'Pusing', 'Keringat Dingain','Sakit Kepala',],
                        'Kedinginan' => ['Gejala Kedinginan yang muncul ?', 'Menggigil'],
                        'Sakit Kepala' => ['Gejala Sakit Kepala yang muncul ?', 'Nyeri dikepala', 'Leher Kaku'],
                        'Nyeri Haid' => ['Gejala Nyeri Haid yang muncul ?', 'Perubahan Mood', 'Nyeri Perut Bawah'],
                        'Mual akbiat komoterapi' => ['Gejala Mual Akibat Kemo Terapi yang muncul ?','Mual','Penurunan nafsu makan'],
                        'Kurang Nafsu Makan' => ['Gejala Kurang Nafsu Makan yang muncul ?','Penurunan Berat Badan','Cepat Kenyang',],
                        'Kelelahan' => ['Gejala Kelelahan yang muncul ?', 'Lemas', 'Rasa Lelah Berlebihan'],
                        'Diare' => ['Gejala Diare yang muncul', 'BAB Cair', 'Keram Perut'],
                        'Tenggorokan Serak' => ['Gejala Tenggorokan Serak yang muncul ?','Suara Serak','Tenggorokan Kering',],
                        'Radang Lambung' => ['Gejala Radang Lambung yang muncul ?', 'Nyeri diPerut Atas', 'Mual'],
                        'Batuk Berdahak' => ['Gejala Batuh Berdahak yang muncul ?', 'Berdahak', 'Sakit diTenggorokan'],
                        'Sakit Perut' => ['Gejala Sakit Perut yang muncul ?', 'Nyeri Perut', 'Perut Kembung'],
                        'Pusing' => ['Gejala Pusing yang muncul ?', 'Mual', 'Berkunang-kunang', 'Lemas'],
                        'Perut Kembung' => ['Gejala Perut Kembung yang muncul ?','Rasa Penuh diPerut','Sering Sendawa / Kentut'],
                        'Demam' => ['Gejala Demam yang muncul ?', 'Suhu Tubuh Tinggi', 'Berkeringat'],
                        'Gangguan Hati' => ['Gejala Gangguan Hati yang muncul ?','Bola Mata Kuning','Nyeri Perut Bagian Kanan Atas'],
                        'Sembelit' => ['Gejala Sembelit yang muncul ?', 'Sulit BAB', 'Kembung'],
                        'Peluru Haid' => ['Gejala Peluru Haid yang muncul ?','Kram diperut Bawah','Mestruasi Tidak Teratur'],
                        'Tombo Cekok' => ['Gejala Tombo Cekok yang muncul ?', 'Demam pada anak-anak'],
                        'Influenza' => ['Gejala Influenza yang muncul ?', 'Demam Tinggi', 'Batuk Kering'],
                        'Gatal Kulit' => ['Gejala Gatal Kulit yang muncul ?', 'Kemerahan Pada Kulit', 'Bentol'],
                        'Sariawan' => ['Gejala Sariawan yang muncul ?', 'terasa perih'],
                        'Panas Dalam' => ['Gejala Panas Dalam yang muncul ?', 'Sariawan', 'Tenggorokan Kering'],
                        'Radang Pencernaan' => ['Gejala Radang Pencernaan yang muncul ?', 'Nyeri Perut', 'Diare'],
                        'Kesehatan Lambung' => ['Gejala Kesehatan Lambung yang muncul ?', 'Mual', 'Nyeri Perut Atas'],
                        'Terlambat Haid' => ['Gejala Terlambat Haid yang muncul ?', 'Perut Kembung', 'Perubahan Mood'],
                    ];
                @endphp
                @php
                $gejalaSemntara = []; 
            @endphp
            
            @foreach ($keluhan_penyakit as $item)
                @foreach ($data as $penyakit => $gejala)
                    @if ($item == $penyakit)
                        <div class="item">
                            <div class="no">
                                <h3>{{ $no++ }}</h3>
                                <p>{{ $gejala[0] }}</p>
                            </div>
                            <div class="detail">
                                @foreach (array_slice($gejala, 1) as $value)
                                    @if (!in_array($value, $gejalaSemntara)) 
                                        @php
                                            $gejalaSemntara[] = $value; 
                                        @endphp
                                        <div>
                                            <input type="checkbox" name="{{ $value }}" id="{{ $value }}" value="{{ $penyakit }}">
                                            <label for="{{ $value }}">{{ $value }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
            

                <button class="button" type="submit">Proses</button>
            </form>
        </div>
    </div>
@endsection
