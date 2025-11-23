<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\StokFarmasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::orderByDesc('id_resep')->paginate(15);
        return view('farmasi.resep.index', compact('resep'));
    }

    public function create()
    {
        // biasanya kirim list obat ke view
        // $obat = Obat::orderBy('nama_obat')->get();
        // return view('farmasi.resep.create', compact('obat'));

        return view('farmasi.resep.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_resep' => 'required|string',
            'items'       => 'required|array|min:1',
            'items.*.id_obat'        => 'required|integer',
            'items.*.jumlah_diminta' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            // 1. simpan header resep
            $resep = Resep::create([
                'id_kunjungan'   => $request->id_kunjungan,
                'id_pasien'      => $request->id_pasien,
                'id_dokter'      => $request->id_dokter,
                'tgl_resep'      => now()->toDateString(),
                'status_resep'   => 'selesai',
                'jenis_resep'    => $request->jenis_resep,
                'catatan_dokter' => $request->catatan_dokter,
            ]);

            // 2. simpan detail dan update stok
            foreach ($request->items as $item) {
                $idObat = (int) $item['id_obat'];
                $jumlah = (int) $item['jumlah_diminta'];

                ResepDetail::create([
                    'id_resep'       => $resep->id_resep,
                    'id_obat'        => $idObat,
                    'jumlah_diminta' => $jumlah,
                    'jumlah_diberi'  => $jumlah,
                    'aturan_pakai'   => $item['aturan_pakai'] ?? null,
                ]);

                // kurangi stok farmasi
                StokFarmasi::ubahQty($idObat, -$jumlah);
            }
        });

        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil diproses.');
    }

    public function show($id)
    {
        $resep = Resep::with('details.obat')->findOrFail($id);
        return view('farmasi.resep.show', compact('resep'));
    }
}
