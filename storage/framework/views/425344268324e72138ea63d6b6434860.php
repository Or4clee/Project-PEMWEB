

<?php $__env->startSection('title', 'Data Resep'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Data Resep</h1>
    <a href="<?php echo e(route('resep.create')); ?>" class="btn btn-primary">+ Input Resep</a>
</div>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>ID Resep</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Status</th>
            <th width="120">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $resep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($r->id_resep); ?></td>
            <td><?php echo e($r->tgl_resep); ?></td>
            <td><?php echo e($r->jenis_resep); ?></td>
            <td><?php echo e($r->status_resep); ?></td>
            <td>
                <a href="<?php echo e(route('resep.show', $r->id_resep)); ?>" class="btn btn-sm btn-info">Detail</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5" class="text-center">Belum ada resep.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php echo e($resep->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\farmasi-service\resources\views/farmasi/resep/index.blade.php ENDPATH**/ ?>