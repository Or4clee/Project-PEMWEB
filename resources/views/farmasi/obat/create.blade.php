@extends('layouts.app')

@section('title', 'Tambah Obat')

@section('content')
<h1 class="h3 mb-3">Tambah Obat</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('obat.store') }}" method="POST" class="card p-3">
    @csrf

    <div class="mb-3">
        <label class="form-label">Kode Obat</label>
        <input type="text" name="kode_obat" value="{{ old('kode_obat') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Obat</label>
        <input type="text" name="nama_obat" value="{{ old('nama_obat') }}" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Bentuk</label>
            <input type="text" name="bentuk" value="{{ old('bentuk') }}" class="form-control" placeholder="tablet, kapsul, sirup...">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Jumlah Obat</label>
            <input type="number" name="satuan" value="{{ old('satuan') }}" class="form-control" placeholder="Jumlah">
        </div>
        <div class="col-md-4 mb-3">
    <label class="form-label">Stok Minimal</label>
    <input type="number" name="stok_minimal" class="form-control"
           value="{{ old('stok_minimal', $obat->stok->stok_minimal ?? 0) }}">
    </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control" placeholder="antibiotik, vitamin, analgesik...">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" value="{{ old('harga_jual') }}" class="form-control" placeholder="Rp." required>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
