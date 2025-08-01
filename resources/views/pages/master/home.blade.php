@extends('layouts.app-master')

@section('title', 'Setelan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setelan</h1>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 70vh;">
                <h2 class="mt-4" style="color: #378538;">Setelan</h2>
                <!-- Ganti #007bff dengan kode warna yang diinginkan -->
                <img src="{{ asset('img/Logo UNIPOL.png') }}" alt="Logo" class="img-fluid" style="max-width: 20%;">
                <h2 class="mt-4" style="color: #378538;">Universitas Lamappapoleonro</h2>
                <!-- Ganti #28a745 dengan kode warna yang diinginkan -->
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
