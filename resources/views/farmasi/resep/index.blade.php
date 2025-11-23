@extends('layouts.app')

@section('title', 'Data Resep')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Data Resep</h1>
    <a href="{{ route('resep.create') }}" class="btn btn-primary">+ Input Resep</a>
</div>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>ID Resep</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Status</th>
            <th width="120">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($resep as $r)
        <tr>
            <td>{{ $r->id_resep }}</td>
            <td>{{ $r->tgl_resep }}</td>
            <td>{{ $r->jenis_resep }}</td>
            <td>{{ $r->status_resep }}</td>
            <td>
                <a href="{{ route('resep.show', $r->id_resep) }}" class="btn btn-sm btn-info">Detail</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada resep.</td>
        </tr>
    @endforelse
    </tbody>
</table>

{{ $resep->links() }}
@endsection
