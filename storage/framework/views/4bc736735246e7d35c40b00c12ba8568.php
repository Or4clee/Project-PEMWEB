

<?php $__env->startSection('title', 'Data Obat'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Data Obat</h1>
    <a href="<?php echo e(route('obat.create')); ?>" class="btn btn-primary">+ Tambah Obat</a>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Bentuk</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th class="text-end">Harga Jual</th>
            <th>Status</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($o->kode_obat); ?></td>
            <td><?php echo e($o->nama_obat); ?></td>
            <td><?php echo e($o->bentuk); ?></td>
            <td><?php echo e($o->satuan); ?></td>
            <td><?php echo e($o->kategori); ?></td>
            <td class="text-end"><?php echo e(number_format($o->harga_jual, 0, ',', '.')); ?></td>
            <td>
                <?php if($o->status_aktif): ?>
                    <span class="badge bg-success">Aktif</span>
                <?php else: ?>
                    <span class="badge bg-secondary">Nonaktif</span>
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo e(route('obat.edit', $o->id_obat)); ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?php echo e(route('obat.destroy', $o->id_obat)); ?>"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Hapus obat ini?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="8" class="text-center">Belum ada data obat.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php echo e($obat->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\farmasi-service\resources\views/farmasi/obat/index.blade.php ENDPATH**/ ?>