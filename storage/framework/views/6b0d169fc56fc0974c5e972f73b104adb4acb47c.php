
<?php $__env->startSection('content'); ?>

    
    <div class="row mt-4">
        <div class="col-md-12 d-flex">
            <div class="col-md-5">
                Fotos
            </div>
            <div class="col-md-7">
                <h3><?php echo e($product->name); ?></h3>
                <p><?php echo e($product->description); ?></p>
                <p><?php echo e(number_format($product->price, 2,',','.')); ?></p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/single/product.blade.php ENDPATH**/ ?>