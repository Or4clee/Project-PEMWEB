

<?php $__env->startSection('title', 'Edit Obat'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-3">Edit Obat</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('obat.update', $obat->id_obat)); ?>" method="POST" class="card p-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label class="form-label">Kode Obat</label>
        <input type="text" name="kode_obat" value="<?php echo e(old('kode_obat', $obat->kode_obat)); ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Obat</label>
        <input type="text" name="nama_obat" value="<?php echo e(old('nama_obat', $obat->nama_obat)); ?>" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Bentuk</label>
            <input type="text" name="bentuk" value="<?php echo e(old('bentuk', $obat->bentuk)); ?>" class="form-control">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Satuan</label>
            <input type="text" name="satuan" value="<?php echo e(old('satuan', $obat->satuan)); ?>" class="form-control">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="<?php echo e(old('kategori', $obat->kategori)); ?>" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" value="<?php echo e(old('harga_jual', $obat->harga_jual)); ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status_aktif" class="form-select">
            <option value="1" <?php echo e(old('status_aktif', $obat->status_aktif) == 1 ? 'selected' : ''); ?>>Aktif</option>
            <option value="0" <?php echo e(old('status_aktif', $obat->status_aktif) == 0 ? 'selected' : ''); ?>>Nonaktif</option>
        </select>
    </div>

    <div class="d-flex justify-content-between">
        <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\farmasi-service\resources\views/farmasi/obat/edit.blade.php ENDPATH**/ ?>