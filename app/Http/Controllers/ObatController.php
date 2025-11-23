<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::orderBy('nama_obat')->paginate(15);
        return view('farmasi.obat.index', compact('obat'));
    }

    public function create()
    {
        return view('farmasi.obat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_obat'  => 'required|max:50|unique:obat,kode_obat',
            'nama_obat'  => 'required|max:150',
            'bentuk'     => 'nullable|max:50',
            'satuan'     => 'nullable|max:50',
            'kategori'   => 'nullable|max:100',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        $validated['status_aktif'] = 1;

        Obat::create($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('farmasi.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $validated = $request->validate([
            'kode_obat'  => 'required|max:50|unique:obat,kode_obat,' . $obat->id_obat . ',id_obat',
            'nama_obat'  => 'required|max:150',
            'bentuk'     => 'nullable|max:50',
            'satuan'     => 'nullable|max:50',
            'kategori'   => 'nullable|max:100',
            'harga_jual' => 'required|numeric|min:0',
            'status_aktif' => 'required|in:0,1',
        ]);

        $obat->update($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil diupdate.');
    }

    public function destroy($id)
    {
        Obat::where('id_obat', $id)->delete();

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil dihapus.');
    }
}
