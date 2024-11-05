@extends('main')
@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Konsultasi</a>
        </div>

        <div class="hasil">
            <div class="box">
                <h1>Hasil</h1>
                <hr>
                <p>dari hasil pengecakan dan diagnosa untuk mengatasi</p>
                @php
                    $penyakit_list = $penyakit;
                    // Cek jika ada lebih dari satu elemen
                    if (count($penyakit_list) > 1) {
                        // Gabungkan semua elemen kecuali yang terakhir dengan koma
                        $last_item = array_pop($penyakit_list); // Mengambil elemen terakhir
                        $penyakit_text = implode(', ', $penyakit_list) . ' dan ' . $last_item;
                    } else {
                        // Jika hanya satu elemen, langsung gunakan
                        $penyakit_text = implode(', ', $penyakit_list);
                    }
                @endphp

                <h3>{{ $penyakit_text }}</h3>
                <p>kami akan membuatkan Jamu dengan racikan seperti berikut komposisinya :</p>
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>Nama Jamu</th>
                        <th>Presentase</th>
                    </tr>
                    @foreach ($presentase as $key => $value)
                        @if ($value != 0)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ number_format($value, 1) }}%</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <p>Dalam satu Gelas</p>
            </div>

            @php
                $khasiat = [
                    // Jahe
                    'Masuk Angin' => 'Mengatasi gejala masuk angin',
                    'Mabuk Perjalanan' => 'Meredakan mabuk perjalanan',
                    'Kedinginan' => 'Menghangatkan tubuh',
                    'Sakit Kepala' => 'Merdakan sakit kepala',
                    'Mual akbiat komoterapi' => 'Meredakan mual akibat komoterapi',
                    'Kurang Nafsu Makan' => 'Menambah nafsu makan',
                    'Kelelahan' => 'Membantu mengatasi kelelahan',
                    'Diare' => 'Membantu mengatasi diare',

                    // Beras Kencur
                    'Tenggorokan Serak' => 'Membersihkan tenggorokan',
                    'Radang Lambung' => 'Membantu meredakan radang lambung',
                    'Batuk Berdahak' => 'Mengeluarkan dahak dan menghentikan batuk',
                    'Sakit Perut' => 'Meningkatkan sistem kekebalan tubuh',
                    'Pusing' => 'Membantu mengatasi rasa pusing di kepala',
                    'Perut Kembung' => 'Mengatasi perut kembung',
                    'Nyeri Haid' => 'Membantu mengatasi masalah menstruasi atau nyeri ketika haid',

                    // Temu Lawak
                    'Demam' => 'Mengatasi demam',
                    'Gangguan Hati' => 'Mengobati gangguan hati',
                    'Sembelit' => 'Mengatasi masalah sembelit ',
                    'Peluruh Haid' => 'Memperbaiki system hormonal  tubuh',
                    'Tombo Cekok' => 'Tubuh berenergi, menambah nafsu makan',

                    // Kunir Asem
                    'influenza' => 'Mengatasi Influenza',
                    'Gatal Kulit' => '',
                    'Sariawan' => 'Mengatasi mual dan muntah',
                    'Panas Dalam' => 'Membantu mengatasi panas dalam',
                    'Radang Pencernaan' => 'Membantu mengatasi peradangan pada pencernaan',
                    'Kesehatan Lambung' => 'Membantu meningkatkan kesehatan lambung',
                    'Terlambat Haid' => 'Membantu memperlancar haid',
                ];
            @endphp
            <div class="box">
                <h1>KHASIAT</h1>
                <hr>
                <div class="khasiat">
                    @php
                        $output = []; // Array untuk menampung semua khasiat
                        foreach ($penyakit as $item) {
                            if (array_key_exists($item, $khasiat)) {
                                $output[] = $khasiat[$item]; // Menambahkan khasiat ke array output
                            }
                        }
                    @endphp

                    @if (count($output) > 1)
                        <p>
                            {{ implode(', ', array_slice($output, 0, -1)) }} dan {{ end($output) }}
                        </p>
                    @elseif (count($output) === 1)
                        <p>{{ $output[0] }}</p> <!-- Jika hanya ada satu khasiat -->
                    @endif
                </div>

                <button id="buatJamuBtn">
                    Buat Jamu
                </button>

                <p id="statusText"></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#buatJamuBtn').click(function() {
                const persentase = @json($presentase);

                Object.keys(persentase).forEach(key => {
                    persentase[key] = Math.round(parseFloat(persentase[key]) * 10) / 10;
                });

                persentase['status'] = 1;
                console.log(persentase);

                $(this).html(
                        '<div class="loading-content"><div class="loading-spinner"></div> Proses</div>')
                    .prop('disabled', true);

                $('#statusText').text('Harap Menunggu...').show();

                document.getElementById('statusText').scrollIntoView({
                    behavior: 'smooth'
                });

                $.ajax({
                    url: 'https://dahatech-5f699-default-rtdb.asia-southeast1.firebasedatabase.app/jamu.json',
                    type: 'PATCH',
                    contentType: 'application/json',
                    data: JSON.stringify(persentase),
                    success: function(response) {
                        console.log('Data berhasil dikirim ke Firebase:', response);

                        checkStatusInFirebase();
                    },
                    error: function(error) {
                        console.error('Gagal mengirim data ke Firebase:', error);

                        $('#statusText').text('Gagal mengirim data, coba lagi.');

                        $('#buatJamuBtn').html('Buat Jamu').prop('disabled', false);
                    }
                });
            });

            function checkStatusInFirebase() {
                const interval = setInterval(function() {
                    $.ajax({
                        url: 'https://dahatech-5f699-default-rtdb.asia-southeast1.firebasedatabase.app/jamu/status.json',
                        type: 'GET',
                        success: function(response) {
                            console.log('Status saat ini:', response);

                            if (response === 0) {
                                clearInterval(interval);
                                $('#buatJamuBtn').html('Buat Lagi').prop('disabled', false);
                                $('#statusText').text('Proses Selesai, Silahkan menikmati');

                                document.getElementById('statusText').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            } else if (response === 1) {
                                $('#buatJamuBtn').html(
                                        '<div class="loading-content"><div class="loading-spinner"></div> Proses</div>'
                                        )
                                    .prop('disabled', true);
                                $('#statusText').text('Harap Menunggu...').show();
                            }
                        },
                        error: function(error) {
                            console.error('Gagal memeriksa status:', error);
                        }
                    });
                }, 3000);
            }
        });
    </script>
@endsection
