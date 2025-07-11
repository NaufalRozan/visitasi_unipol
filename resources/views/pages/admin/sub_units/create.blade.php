@extends('layouts.app-user')

@section('title', 'Tambah Sub-Unit')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Sub-Unit</h1>
            </div>

            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('sub-units.store') }}" method="POST">
                    @csrf

                    <!-- Input Nama Sub-Unit -->
                    <div class="form-group">
                        <label for="nama_sub_unit">Nama Sub-Unit</label>
                        <input type="text" name="nama_sub_unit" id="nama_sub_unit"
                            class="form-control @error('nama_sub_unit') is-invalid @enderror"
                            value="{{ old('nama_sub_unit') }}" required>
                        @error('nama_sub_unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown Pilih Unit -->
                    <div class="form-group">
                        <label for="unit_id">Pilih Unit</label>
                        <select name="unit_id" id="unit_id" class="form-control @error('unit_id') is-invalid @enderror"
                            required>
                            <option value="" disabled {{ old('unit_id') ? '' : 'selected' }}>-- Pilih Unit --</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-2">Tambah Sub-Unit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
