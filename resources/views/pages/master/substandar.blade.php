@extends('layouts.app-master')

@section('title', 'Sub-Bagian Dashboard')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sub-Bagian</h1>
            </div>

            <!-- Dropdown Pemilihan Fakultas, Prodi, Akreditasi, dan Standar -->
            <div class="section-body">
                <form method="GET" action="{{ route('substandar.index') }}" id="filterForm">
                    <div class="form-group d-flex justify-content-between">
                        @if ($user->role !== 'Prodi')
                            <!-- Kolom Kiri: Fakultas -->
                            <div class="w-50 pr-2">
                                <label for="units">Fakultas</label>
                                <select name="unit_id" id="units" class="form-control" required>
                                    <option value="" disabled selected>Pilih Fakultas</option>
                                    @foreach ($unit as $f)
                                        <option value="{{ $f->id }}"
                                            {{ request('unit_id') == $f->id ? 'selected' : '' }}>
                                            {{ $f->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kolom Kanan: Prodi -->
                            <div class="w-50 pl-2" id="sub_unitWrapper">
                                <label for="sub_units">Program Studi</label>
                                <select name="sub_unit_id" id="sub_units" class="form-control" disabled required>
                                    <option value="">Pilih Fakultas Terlebih Dahulu</option>
                                    @foreach ($sub_units as $p)
                                        <option value="{{ $p->id }}" data-units="{{ $p->unit_id }}"
                                            {{ request('sub_unit_id') == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama_sub_unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <!-- Untuk role Prodi, tampilkan data dari session -->
                            <input type="hidden" name="unit_id" value="{{ $sub_unit->units->id }}">
                            <input type="hidden" name="sub_unit_id" value="{{ $sub_unit->id }}">
                            <div class="w-50 pr-2">
                                <label for="units">Fakultas</label>
                                <input type="text" class="form-control" value="{{ $sub_unit->units->nama_unit }}"
                                    disabled>
                            </div>
                            <div class="w-50 pl-2">
                                <label for="sub_units">Program Studi</label>
                                <input type="text" class="form-control" value="{{ $sub_unit->nama_sub_unit }}" disabled>
                            </div>
                        @endif
                    </div>

                    <!-- Dropdown untuk Standar -->
                    <div class="form-group">
                        <div class="">
                            <label for="standar">Bagian</label>
                            <select name="standar_id" id="standar" class="form-control" onchange="this.form.submit()">
                                <option value="" disabled selected>Pilih Bagian</option>
                                @foreach ($standars as $standar)
                                    <option value="{{ $standar->id }}"
                                        {{ request('standar_id') == $standar->id ? 'selected' : '' }}>
                                        {{ $standar->nama_standar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tambahkan Dropdown untuk jumlah row per halaman -->
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="perPage">Baris:</label>
                            <select name="perPage" id="perPage" class="form-control"
                                onchange="document.getElementById('filterForm').submit();">
                                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="search">Cari Nama Sub-Bagian</label>
                            <input type="text" id="search" name="search" class="form-control"
                                placeholder="Cari Nama Sub-Bagian">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tombol Tambah Data -->
            <div class="section-body mt-4">
                @if (request('standar_id') && ($user->role === 'Prodi' || $user->sub_units->contains('id', request('sub_unit_id'))))
                    <button class="btn btn-success mb-3" onclick="openModal()">Tambah Data</button>
                @endif

                <!-- Tabel Substandar -->
                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">Drag</th>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 70%">Nama Sub-Bagian</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="substandarTableBody">
                                @if ($substandars->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data substandar yang ditemukan.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($substandars as $substandar)
                                        <tr data-id="{{ $substandar->id }}">
                                            <td><i class="fas fa-bars handle sort-handler"></i></td>
                                            <td>{{ $substandar->no_urut }}</td>
                                            <td>{{ $substandar->nama_substandar }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="openModal('edit', {{ $substandar->id }}, '{{ $substandar->nama_substandar }}', {{ $substandar->no_urut }})">Edit</button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $substandar->id }})">Delete</button>
                                                <form id="delete-form-{{ $substandar->id }}"
                                                    action="{{ route('substandar.destroy', ['substandar' => $substandar->id, 'perPage' => request('perPage', 5)]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- Tambahkan Pagination -->
                        <div class="mt-3">
                            {{ $substandars instanceof \Illuminate\Pagination\LengthAwarePaginator ? $substandars->appends(['unit_id' => request('unit_id'), 'sub_unit_id' => request('sub_unit_id'), 'standar_id' => request('standar_id'), 'perPage' => $perPage])->links() : '' }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-sweet-alert-delete />

    <!-- Modal -->
    <div id="tambahDataModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-content"
            style="background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 50%; max-width: 500px; border-radius: 8px;">
            <span class="close" onclick="closeModal()"
                style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <h2 id="modalTitle" class="text-center mb-4">Tambah Substandar</h2>
            <form id="substandarForm" action="{{ route('substandar.store') }}" method="POST">
                @csrf
                <input type="hidden" id="methodField" name="_method" value="POST">
                <input type="hidden" name="standar_id" value="{{ request('standar_id') }}">
                <input type="hidden" name="akreditasi_id" value="{{ request('akreditasi_id') }}">

                <!-- Hidden Input untuk perPage -->
                <input type="hidden" name="perPage" value="{{ $perPage }}">

                <!-- Pastikan standar_id dan akreditasi_id tersimpan -->

                <!-- No Urut (Editable) -->
                <div class="mb-4">
                    <label for="no_urut" class="block text-sm font-medium text-gray-700">No Urut</label>
                    <input type="text" name="no_urut" id="no_urut" value="{{ $nextNumber }}"
                        class="form-control" required>
                </div>

                <!-- Nama Substandar -->
                <div class="mb-4">
                    <label for="nama_substandar" class="block text-sm font-medium text-gray-700">Nama Substandar</label>
                    <input type="text" name="nama_substandar" id="nama_substandar" required class="form-control">
                </div>

                <div>
                    <button type="submit" id="submitBtn" class="btn btn-success">
                        Tambah Substandar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var searchQuery = $(this).val();

                $.ajax({
                    url: '{{ route('substandar.index') }}',
                    type: 'GET',
                    data: {
                        search: searchQuery,
                        unit_id: $('#units').val(),
                        sub_unit_id: $('#sub_units').val(),
                        standar_id: $('#standar').val(), // pastikan standar_id dikirimkan
                        perPage: $('#perPage').val(),
                    },
                    success: function(response) {
                        // Replace entire section to avoid partial replacement errors
                        $('.table-responsive').html($(response).find('.table-responsive')
                            .html());
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi SortableJS pada tabel
            var el = document.getElementById('substandarTableBody');
            var sortable = Sortable.create(el, {
                handle: '.handle',
                animation: 150,
                onEnd: function(evt) {
                    var order = [];
                    $('#substandarTableBody tr').each(function(index, element) {
                        order.push({
                            id: $(element).data('id'),
                            no_urut: index + 1
                        });

                        // Update no_urut langsung pada tabel setelah drag
                        $(element).find('td:eq(1)').text(index + 1);
                    });

                    // Kirim urutan baru ke server menggunakan AJAX
                    $.ajax({
                        url: "{{ route('substandar.updateOrder') }}",
                        method: 'POST',
                        data: {
                            order: order,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Order updated successfully');
                        },
                        error: function(response) {
                            console.error('Error updating order');
                        }
                    });
                }
            });
        });

        // Tambahkan kode lain terkait dropdown prodi dan fakultas
        document.addEventListener('DOMContentLoaded', function() {
            var fakultasDropdown = document.getElementById('units');
            var prodiDropdown = document.getElementById('sub_units');
            var allProdiOptions = Array.from(prodiDropdown.options); // Simpan semua opsi program studi

            function toggleProdiDropdown() {
                if (!fakultasDropdown.value) {
                    prodiDropdown.disabled = true;
                    prodiDropdown.innerHTML = '<option value="">Pilih Fakultas Terlebih Dahulu</option>';
                } else {
                    prodiDropdown.disabled = false;
                    var selectedFakultas = fakultasDropdown.value;
                    prodiDropdown.innerHTML = '<option value="" disabled selected>Pilih Program Studi</option>';

                    allProdiOptions.forEach(function(option) {
                        var fakultasId = option.getAttribute('data-units');
                        if (fakultasId == selectedFakultas) {
                            prodiDropdown.appendChild(option.cloneNode(true));
                        }
                    });
                }
            }

            toggleProdiDropdown();

            fakultasDropdown.addEventListener('change', function() {
                toggleProdiDropdown();
            });

            prodiDropdown.addEventListener('change', function() {
                prodiDropdown.disabled = false;
            });
        });

        document.getElementById('sub_units').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        function openModal(mode = 'create', id = null, nama_substandar = '', no_urut = '') {
            document.getElementById('tambahDataModal').style.display = 'block';
            if (mode === 'edit') {
                document.getElementById('modalTitle').innerText = 'Edit Substandar';
                document.getElementById('submitBtn').innerText = 'Update Substandar';
                document.getElementById('substandarForm').action = '/substandar/' + id;
                document.getElementById('methodField').value = 'PUT';
                document.getElementById('nama_substandar').value = nama_substandar;
                document.getElementById('no_urut').value = no_urut;
            } else {
                document.getElementById('modalTitle').innerText = 'Tambah Substandar';
                document.getElementById('submitBtn').innerText = 'Tambah Substandar';
                document.getElementById('substandarForm').action = '{{ route('substandar.store') }}';
                document.getElementById('methodField').value = 'POST';
                document.getElementById('nama_substandar').value = '';
                document.getElementById('no_urut').value = '{{ $nextNumber }}';
            }
        }

        function closeModal() {
            document.getElementById('tambahDataModal').style.display = 'none';
        }
    </script>
@endpush
