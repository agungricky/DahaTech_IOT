<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $app = $request->except('_token');

        $keluhan_penyakit = [];
        foreach ($app as $item) {
            $keluhan_penyakit[] = $item;
        }


        return view('diagnosa', compact('keluhan_penyakit'));
    }

    public function diagnosa(Request $request)
    {
        $app = $request->except('_token');

        $dataset = [
            'Jahe' => ['Masuk Angin', 'Mabuk Perjalanan', 'Kedinginan', 'Sakit Kepala', 'Mual akbiat komoterapi', 'Kurang Nafsu Makan', 'Kelelahan', 'Diare'],
            'Beras_Kencur' => ['Masuk Angin', 'Kurang Nafsu Makan', 'Sakit Kepala', 'Nyeri Haid', 'Tenggorokan Serak', 'Radang Lambung', 'Batuk Berdahak', 'Sakit Perut', 'Pusing', 'Perut Kembung'],
            'Temu_lawak' => ['Kurang Nafsu Makan', 'Demam', 'Gangguan Hati', 'Sembelit', 'Peluru Haid', 'Tombo Cekok'],
            'Kunir_asem' => ['Nyeri Haid', 'Influenza', 'Gatal Kulit', 'Sariawan', 'Panas Dalam', 'Radang Pencernaan', 'Kesehatan Lambung', 'Terlambat Haid', 'Diare'],
        ];

        $data = [];
        foreach ($app as $key => $value) {
            foreach ($dataset as $jamu => $item) {
                if (in_array($value, $item)) {
                    $data[$jamu][] = $value;
                }
            }
        }

        $banyak_data = [
            'Jahe' => isset($data['Jahe']) ? count($data['Jahe']) : 0,
            'Beras Kencur' => isset($data['Beras_Kencur']) ? count($data['Beras_Kencur']) : 0,
            'Temu lawak' => isset($data['Temu_lawak']) ? count($data['Temu_lawak']) : 0,
            'Kunir asem' => isset($data['Kunir_asem']) ? count($data['Kunir_asem']) : 0,
        ];

        $penjumlahan_data = [];
        foreach ($banyak_data as $key => $value) {
            $penjumlahan_data[$key] = 3.030 * $value;
        }

        $total_data = 0;
        foreach ($penjumlahan_data as $key => $value) {
            $total_data += $value;
        }

        $presentase = [];
        foreach ($penjumlahan_data as $key => $value) {
            $presentase[$key] = ($value / $total_data) * 100;
        }

        $penyakit = [];
        $penyakit_sementara = [];
        foreach ($app as $key => $value) {
            if (!in_array($value, $penyakit_sementara)) { 
                $penyakit[] = $value; 
                $penyakit_sementara[] = $value;
            }
        }
        // dd($presentase);
        return view('hasil', compact('presentase', 'penyakit'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
