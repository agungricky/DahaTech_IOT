@extends('main')
@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Beli Jamu</a>
        </div>

        <div class="cards">
            <div class="card">
                <div class="profile_jamu">
                    <img src="Assets/img/jamu.jpg" alt="Profile Picture">
                </div>

                <div class="slider-form">
                    <h2>Pembelian Jamu</h2>
                    @if (isset($success))
                    <hr>
                        <div style="text-align: center; color: white;">
                            <span>{{ $success }}</span>
                        </div>
                    @endif
                    <hr>
                    <form action="{{ route('belijamu') }}" method="POST">
                        @csrf
                        <div class="slider-container">
                            <label for="slider1">Jamu Jahe</label>
                            <input type="range" id="slider1" name="jahe" min="0" max="100"
                                value="0">
                            <span class="slider-value" id="value1"></span>
                        </div>
                        <div class="slider-container">
                            <label for="slider2">Temu lawak</label>
                            <input type="range" id="slider2" name="temuLawak" min="0" max="100"
                                value="0">
                            <span class="slider-value" id="value2"></span>
                        </div>
                        <div class="slider-container">
                            <label for="slider3">Kunir Asem</label>
                            <input type="range" id="slider3" name="kunyitAsem" min="0" max="100"
                                value="0">
                            <span class="slider-value" id="value3"></span>
                        </div>
                        <div class="slider-container">
                            <label for="slider4">Beras kencur</label>
                            <input type="range" id="slider4" name="kencur" min="0" max="100"
                                value="0">
                            <span class="slider-value" id="value4"></span>
                        </div>
                        <div class="slider-container">
                            <button type="submit" class="button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui warna isi slider
        function updateSliderFill(slider, displayValue) {
            const value = slider.value;
            const max = slider.max;
            const percentage = (value / max) * 100;

            // Perbarui latar belakang untuk menunjukkan bagian yang terisi
            slider.style.background = `linear-gradient(to right, #3498db ${percentage}%, #ddd ${percentage}%)`;

            // Perbarui nilai yang ditampilkan
            displayValue.textContent = value;
        }

        // Batas maksimum total untuk semua slider
        const sliders = document.querySelectorAll('input[type="range"]');
        const totalDisplay = document.getElementById('totalValue');
        const maxTotal = 100;
        let nilai_jamu = 0; // Variabel untuk menyimpan nilai total slider

        function updateSliderValues() {
            let totalValue = 0;

            // Hitung total dari semua nilai slider
            sliders.forEach(slider => {
                totalValue += parseInt(slider.value);
            });

            // Simpan nilai total ke dalam variabel nilai_jamu
            nilai_jamu = totalValue;

            // Perbarui total yang ditampilkan
            totalDisplay.textContent = totalValue;

            // Nonaktifkan slider dengan nilai 0 dan yang totalnya sudah mencapai 100
            sliders.forEach(slider => {
                slider.disabled = (parseInt(slider.value) === 0) || (totalValue >= maxTotal && parseInt(slider
                    .value) > 0);
            });
        }

        // Inisialisasi semua slider dan tambahkan event listener
        sliders.forEach((slider, index) => {
            const displayValue = document.getElementById(`value${index + 1}`);
            updateSliderFill(slider, displayValue);

            slider.addEventListener('input', (event) => {
                const previousValue = parseInt(slider.value);
                let totalValue = 0;

                // Hitung total saat ini, tidak termasuk nilai slider ini sebelumnya
                sliders.forEach((s) => {
                    totalValue += parseInt(s === slider ? event.target.value : s.value);
                });

                // Perbarui hanya jika total tetap <= 100
                if (totalValue <= maxTotal) {
                    updateSliderFill(slider, displayValue);
                    updateSliderValues();
                } else {
                    // Kembalikan slider ke posisi sebelumnya jika melebihi batas
                    slider.value = previousValue - (totalValue - maxTotal);
                    updateSliderFill(slider, displayValue);
                }
            });
        });

        // Pembaruan awal saat halaman dimuat
        updateSliderValues();
    </script>
@endsection
