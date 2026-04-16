@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="text-primary fw-bold mb-0">Manajemen Data Pasien</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPasienModal">
                    <i class="fas fa-plus me-2"></i>Tambah Pasien
                </button>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-primary fw-bold">Daftar Pasien</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Domisili</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataPasien as $key => $pasien)
                        <tr>
                            <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                            <td><span class="fw-bold text-dark">{{ $pasien->nama }}</span></td>
                            <td>
                                @if($pasien->jenisKelamin->deskripsi == 'Laki-laki')
                                    <span class="badge bg-light text-primary border rounded-pill">
                                        <i class="fas fa-mars me-1"></i>Laki-laki
                                    </span>
                                @else
                                    <span class="badge bg-light text-danger border rounded-pill">
                                        <i class="fas fa-venus me-1"></i>Perempuan
                                    </span>
                                @endif
                            </td>
                            <td>{{ $pasien->desa->nama_desa ?? 'Luar Wilayah' }}</td>
                            <td class="text-end pe-4">
                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pasien ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block opacity-50"></i>
                                Data pasien kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pasien -->
<div class="modal fade" id="tambahPasienModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Tambah Data Pasien Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required>
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="desa_id" class="form-label fw-bold">Domisili Desa</label>
                        <select class="form-select" id="desa_id" name="desa_id" required>
                            <option value="" disabled selected>-- Pilih Desa --</option>
                            @foreach($dataDesa as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="section-title mb-1">Database Rekam Medis</h2>
            <p class="text-muted">Kelola data pasien berdasarkan integrasi tabel Desa & Jenis Kelamin</p>
        </div>
        <a href="{{ route('desa.index') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Kelola Desa
        </a>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card medical-card mb-4 border-0">
                <div class="card-header-medical">
                    <h5 class="mb-0"><i class="fas fa-map-marked-alt"></i> Wilayah Desa</h5>
                </div>
                <div class="list-group list-group-flush shadow-sm">
                    <a href="#" class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center">
                        Semua Wilayah
                        <span class="badge rounded-pill bg-white text-primary fw-bold">{{ $dataDesa->count() }}</span>
                    </a>

                    {{-- Loop data dari tabel 'desa' --}}
                    @foreach($dataDesa as $desa)
                    <a href="?desa={{ $desa->id }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $desa->nama_desa }}
                        <span class="badge rounded-pill bg-light text-dark">0</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="card border-0 shadow-sm bg-primary text-white p-3">
                <small class="opacity-75">Update Terakhir</small>
                <h6 class="mb-0">{{ now()->format('d M Y, H:i') }} WIB</h6>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card medical-card border-0 shadow-sm">
                <div class="card-body-medical p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Identitas Pasien</th>
                                    <th>Gender</th>
                                    <th>Alamat & Desa</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataDesa as $desa)
                                <tr>
                                    <td class="text-muted small fw-bold">#{{ $desa->id }}</td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $desa->nama_desa }}</div>
                                        <div class="text-muted small" style="font-size: 11px;">
                                            <i class="fas fa-map-marker me-1"></i>Kelurahan
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marked-alt me-1"></i> Desa
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold small">{{ $desa->nama_desa }}</div>
                                        <div class="text-muted x-small text-truncate" style="max-width: 150px;">
                                            Kelurahan
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('desa.show', $desa->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                <i class="fas fa-eye me-1"></i> Lihat
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <i class="fas fa-folder-open fa-3x mb-3 d-block opacity-25"></i>
                                        <p>Belum ada data desa terdaftar.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS Penajaman Tampilan */
    .x-small { font-size: 11px; }
    .bg-primary { background: linear-gradient(135deg, #0d47a1 0%, #1976d2 100%) !important; }

    .list-group-item {
        border: none;
        padding: 15px 20px;
        transition: all 0.2s;
    }

    .list-group-item.active {
        background-color: #f0f7ff;
        color: #0d6efd;
        border-right: 4px solid #0d6efd;
        font-weight: 600;
    }

    .table thead th {
        background-color: #fcfdfe !important;
        border-bottom: 2px solid #eef2f7 !important;
        color: #5d7186;
        font-size: 12px;
    }

    .badge-male { background-color: #e3f2fd; color: #0d47a1; border-radius: 6px; }
    .badge-female { background-color: #fce4ec; color: #c2185b; border-radius: 6px; }
</style>
@endsection
