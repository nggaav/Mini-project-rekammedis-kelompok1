@extends('layouts.app')

@section('content')
<style>
    /* Background Full Gradasi Biru */
    body {
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%) !important;
        min-height: 100vh;
        color: #333;
    }

    .container-fluid {
        padding-top: 30px;
    }

    /* Card Style Modern */
    .card {
        border: none;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9); /* Putih transparan */
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        margin-bottom: 25px;
    }

    .card-header {
        background: transparent !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
        padding: 20px !important;
    }

    /* Judul dengan Gradasi */
    .text-gradient {
        background: linear-gradient(to right, #2563eb, #0ea5e9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Tombol Biru Kece */
    .btn-primary {
        background: linear-gradient(to right, #2563eb, #0ea5e9) !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 10px 25px !important;
        font-weight: 600 !important;
        transition: 0.3s all ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
    }

    /* Tabel Estetik */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: #f8fafc;
        border-top: none;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        padding: 15px;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .badge-desa {
        background: #e0f2fe;
        color: #0369a1;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
    }
</style>

<div class="container-fluid py-4">
    {{-- Form Input --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 text-gradient fw-bold">
                <i class="fas fa-notes-medical me-2"></i>Input Data Rekam Medis
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('desa.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">NAMA PASIEN</label>
                        <input type="text" name="nama_pasien" class="form-control border-0 bg-light" placeholder="Masukkan nama..." required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-secondary small">JENIS KELAMIN</label>
                        <select name="jenis_kelamin_id" class="form-select border-0 bg-light" required>
                            <option value="">-- Pilih --</option>
                            @foreach($dataJenisKelamin as $jk)
                                <option value="{{ $jk->id }}">{{ $jk->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-secondary small">DOMISILI (DESA)</label>
                        <select name="desa_id" class="form-select border-0 bg-light" required>
                            <option value="">-- Pilih Desa --</option>
                            @foreach($dataDesa as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 shadow-sm">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <div class="p-4 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-gradient fw-bold">Daftar Pasien per Wilayah</h5>
                <span class="badge bg-primary rounded-pill">{{ count($dataPasien) }} Pasien</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Domisili (Desa)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPasien as $item)
                        <tr>
                            <td class="text-center fw-bold text-secondary">{{ $loop->iteration }}</td>
                            <td class="fw-bold text-dark">{{ $item->nama_pasien }}</td>
                            <td>
                                <span class="text-secondary">
                                    <i class="fas {{ $item->jenis_kelamin_id == 1 ? 'fa-venus text-danger' : 'fa-mars text-primary' }} me-1"></i>
                                    {{ $item->jenis_kelamin->deskripsi ?? '-' }}
                                </span>
                            </td>
                            <td><span class="badge-desa">{{ $item->desa->nama_desa ?? '-' }}</span></td>
                            <td class="text-center">
                                <form action="{{ route('desa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <img src="https://illustrations.popsy.co/blue/waiting.svg" style="height: 150px;" alt="empty">
                                <p class="mt-3 text-secondary">Belum ada data pasien di wilayah ini, Rani!</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
