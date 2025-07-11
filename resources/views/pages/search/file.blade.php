@extends('layouts.app-berkas')

@section('title', 'Pencarian Berkas')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hasil Pencarian Berkas: "{{ $query }}"</h1>
            </div>

            <div class="section-body">
                @if ($results->isEmpty())
                    <div class="alert alert-warning">Tidak ada berkas ditemukan.</div>
                @else
                    <ul class="list-group">
                        @foreach ($results as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->deskripsi }}</strong><br>
                                    <small>{{ $item->tipe }} | Substandar:
                                        {{ $item->detail->substandar->nama_substandar ?? '-' }}</small>
                                </div>
                                <a href="{{ route('detail.show', ['substandar_id' => $item->detail->substandar->id]) }}#item-{{ $item->id }}"
                                    class="btn btn-sm btn-primary">
                                    Lihat
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    </div>
@endsection
