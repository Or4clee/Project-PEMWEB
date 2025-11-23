<?php

namespace App\Http\Controllers;

use App\Models\StokFarmasi;

class StokFarmasiController extends Controller
{
    public function index()
    {
        // ambil stok + relasi obat
        $stok = StokFarmasi::with('obat')
            ->orderBy('id_obat')
            ->get();

        return view('farmasi.stok.index', compact('stok'));
    }
}
