

<?php $__env->startSection('title', 'Tambah Obat'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-3">Tambah Obat</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('obat.store')); ?>" method="POST" class="card p-3">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label class="form-label">Kode Obat</label>
        <input type="text" name="kode_obat" value="<?php echo e(old('kode_obat')); ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Obat</label>
        <input type="text" name="nama_obat" value="<?php echo e(old('nama_obat')); ?>" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Bentuk</label>
            <input type="text" name="bentuk" value="<?php echo e(old('bentuk')); ?>" class="form-control" placeholder="tablet, kapsul, sirup...">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Jumlah Obat</label>
            <input type="number" name="satuan" value="<?php echo e(old('satuan')); ?>" class="form-control" placeholder="Jumlah">
        </div>
        <div class="col-md-4 mb-3">
    <label class="form-label">Stok Minimal</label>
    <input type="number" name="stok_minimal" class="form-control"
           value="<?php echo e(old('stok_minimal', $obat->stok->stok_minimal ?? 0)); ?>">
    </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="<?php echo e(old('kategori')); ?>" class="form-control" placeholder="antibiotik, vitamin, analgesik...">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" value="<?php echo e(old('harga_jual')); ?>" class="form-control" placeholder="Rp." required>
    </div>

    <div class="d-flex justify-content-between">
        <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\farmasi-service\resources\views/farmasi/obat/create.blade.php ENDPATH**/ ?>