@extends('layouts.app-user')

@section('title', 'Tambah Unit')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Unit</h1>
            </div>

            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('units.store') }}" method="POST">
                    @csrf

                    <!-- Input Nama Unit -->
                    <div class="form-group">
                        <label for="nama_unit">Nama Unit</label>
                        <input type="text" name="nama_unit" id="nama_unit"
                            class="form-control @error('nama_unit') is-invalid @enderror" value="{{ old('nama_unit') }}"
                            required>
                        @error('nama_unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-2">Tambah Unit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
