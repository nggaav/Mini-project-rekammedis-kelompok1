<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="section-title mb-1">Database Rekam Medis</h2>
            <p class="text-muted">Kelola data pasien berdasarkan integrasi tabel Desa & Jenis Kelamin</p>
        </div>
        <a href="<?php echo e(route('pasien.create')); ?>" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Registrasi Pasien Baru
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
                        <span class="badge rounded-pill bg-white text-primary fw-bold"><?php echo e($pasien->count()); ?></span>
                    </a>

                    
                    <?php $__currentLoopData = $desas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="?desa=<?php echo e($desa->id); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <?php echo e($desa->nama_desa); ?>

                        <span class="badge rounded-pill bg-light text-dark"><?php echo e($desa->pasien_count); ?></span>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="card border-0 shadow-sm bg-primary text-white p-3">
                <small class="opacity-75">Update Terakhir</small>
                <h6 class="mb-0"><?php echo e(now()->format('d M Y, H:i')); ?> WIB</h6>
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
                                <?php $__empty_1 = true; $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted small fw-bold">#<?php echo e($p->id); ?></td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo e($p->nama); ?></div>
                                        <div class="text-muted small" style="font-size: 11px;">
                                            <i class="fas fa-id-card me-1"></i>NIK: <?php echo e($p->nik); ?>

                                        </div>
                                    </td>
                                    <td>
                                        
                                        <?php if($p->jenis_kelamin_id == 1): ?> 
                                            <span class="badge-gender badge-male">
                                                <i class="fas fa-mars me-1"></i> Laki-laki
                                            </span>
                                        <?php else: ?>
                                            <span class="badge-gender badge-female">
                                                <i class="fas fa-venus me-1"></i> Perempuan
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="fw-bold small"><?php echo e($p->desa->nama_desa ?? 'Tanpa Desa'); ?></div>
                                        <div class="text-muted x-small text-truncate" style="max-width: 150px;">
                                            <?php echo e($p->alamat); ?>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(route('pasien.edit', $p->id)); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('pasien.destroy', $p->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Hapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <i class="fas fa-folder-open fa-3x mb-3 d-block opacity-25"></i>
                                        <p>Belum ada data pasien terdaftar.</p>
                                    </td>
                                </tr>
                                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\OneDrive\Desktop\mini-project-rekammedis-kelompok1\resources\views/pasien/index.blade.php ENDPATH**/ ?>