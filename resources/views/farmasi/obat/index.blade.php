@extends('layouts.app')

@section('title', 'Data Obat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Data Obat</h1>
    <a href="{{ route('obat.create') }}" class="btn btn-primary">+ Tambah Obat</a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Bentuk</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th class="text-end">Harga Jual</th>
            <th>Status</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($obat as $o)
        <tr>
            <td>{{ $o->kode_obat }}</td>
            <td>{{ $o->nama_obat }}</td>
            <td>{{ $o->bentuk }}</td>
            <td>{{ $o->satuan }}</td>
            <td>{{ $o->kategori }}</td>
            <td class="text-end">{{ number_format($o->harga_jual, 0, ',', '.') }}</td>
            <td>
                @if($o->status_aktif)
                    <span class="badge bg-success">Aktif</span>
                @else
                    <span class="badge bg-secondary">Nonaktif</span>
                @endif
            </td>
            <td>
                <a href="{{ route('obat.edit', $o->id_obat) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('obat.destroy', $o->id_obat) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Hapus obat ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data obat.</td>
        </tr>
    @endforelse
    </tbody>
</table>

{{ $obat->links() }}
@endsection
