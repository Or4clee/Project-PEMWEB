@extends('layouts.app')

@section('title', 'Detail Resep')

@section('content')
<h1 class="h3 mb-3">Detail Resep #{{ $resep->id_resep }}</h1>

<div class="card mb-3">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Tanggal Resep</dt>
            <dd class="col-sm-9">{{ $resep->tgl_resep }}</dd>

            <dt class="col-sm-3">Jenis Resep</dt>
            <dd class="col-sm-9">{{ $resep->jenis_resep }}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">{{ $resep->status_resep }}</dd>

            <dt class="col-sm-3">Catatan Dokter</dt>
            <dd class="col-sm-9">{{ $resep->catatan_dokter ?? '-' }}</dd>
        </dl>
    </div>
</div>

<h5>Item Obat</h5>
<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah Diminta</th>
            <th>Jumlah Diberi</th>
            <th>Aturan Pakai</th>
        </tr>
    </thead>
    <tbody>
    @forelse($resep->details as $d)
        <tr>
            <td>{{ $d->id_obat }}</td>
            <td>{{ optional($d->obat)->nama_obat ?? '-' }}</td>
            <td>{{ $d->jumlah_diminta }}</td>
            <td>{{ $d->jumlah_diberi }}</td>
            <td>{{ $d->aturan_pakai }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Tidak ada detail obat.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<a href="{{ route('resep.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
