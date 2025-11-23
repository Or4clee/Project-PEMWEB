

<?php $__env->startSection('title', 'Input Resep'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-3">Input Resep Farmasi</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('resep.store')); ?>" method="POST" class="card p-3">
    <?php echo csrf_field(); ?>

    
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Jenis Resep</label>
            <input type="text" name="jenis_resep" class="form-control" value="<?php echo e(old('jenis_resep')); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">ID Pasien (opsional)</label>
            <input type="number" name="id_pasien" class="form-control" value="<?php echo e(old('id_pasien')); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">ID Dokter (opsional)</label>
            <input type="number" name="id_dokter" class="form-control" value="<?php echo e(old('id_dokter')); ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Catatan Dokter (opsional)</label>
        <textarea name="catatan_dokter" class="form-control" rows="2"><?php echo e(old('catatan_dokter')); ?></textarea>
    </div>

    <hr>

    <h5 class="mb-2">Item Obat</h5>
    <p class="text-muted">Untuk sederhana, contoh ini hanya satu baris obat. Kalau mau multi-obat, nanti bisa ditambah JavaScript untuk cloning row.</p>

    <div class="row g-2 mb-3">
        <div class="col-md-3">
            <label class="form-label">ID Obat</label>
            <input type="number" name="items[0][id_obat]" class="form-control"
                   value="<?php echo e(old('items.0.id_obat')); ?>" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Jumlah Diminta</label>
            <input type="number" name="items[0][jumlah_diminta]" class="form-control"
                   value="<?php echo e(old('items.0.jumlah_diminta')); ?>" min="1" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Aturan Pakai</label>
            <input type="text" name="items[0][aturan_pakai]" class="form-control"
                   value="<?php echo e(old('items.0.aturan_pakai')); ?>" placeholder="3x1 sesudah makan">
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="<?php echo e(route('resep.index')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan & Proses Resep</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\farmasi-service\resources\views/farmasi/resep/create.blade.php ENDPATH**/ ?>