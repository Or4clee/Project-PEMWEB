@extends('layouts.app')

@section('title', 'Stok Farmasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Stok Farmasi</h1>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kelola Obat</a>
</div>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Bentuk</th>
            <th>Jumlah Obat</th>
            <th >Stok Saat Ini</th>
            <th >Stok Minimal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @forelse($stok as $item)
        @php
            $qty          = $item->qty ?? 0;
            $stokMinimal  = $item->stok_minimal ?? 0;
            $isKritis     = $qty < $stokMinimal;
        @endphp

        <tr @if($isKritis) class="table-danger" @endif>
            <td>{{ $item->obat->kode_obat ?? '-' }}</td>
            <td>{{ $item->obat->nama_obat ?? '-' }}</td>
            <td>{{ $item->obat->bentuk ?? '-' }}</td>
            <td>{{ $item->obat->satuan ?? '-' }}</td>
            <td >{{ $qty }}</td>
            <td >{{ $stokMinimal }}</td>
            <td>
                @if($isKritis)
                    <span class="badge bg-danger">Kritis</span>
                @else
                    <span class="badge bg-success">Aman</span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data stok. Resep belum pernah diproses atau stok belum di-set.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
