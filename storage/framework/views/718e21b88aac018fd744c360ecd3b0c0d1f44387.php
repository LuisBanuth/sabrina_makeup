

<?php $__env->startSection('scriptsHead'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/galery/css/gallery.css')); ?>">
    <script src="<?php echo e(asset('assets/galery/js/gallery.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
h5 {
    font-size: 1.6em;
}
h6 {
    font-size: 1.3em;
}

.card {
    border-radius: 0;
    box-shadow: 1px 1px 1px 0px rgba(0, 0, 0, 0.15), 0 1px 1px 0 rgba(0, 0, 0, 0.01);
}

</style>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 d-flex m-auto">
            <div class="col-md-6 p-0">
                <img class="img-fluid mb-2" src="<?php echo e(asset('storage/'. $product->photos[0]->path)); ?>" alt="" style="border-radius: 5px">
                <div class="fg-gallery ns">
                    
                    <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset('storage/'. $p->path)); ?>" alt="">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="card-text"><?php echo e($product->body); ?></p>
                        <hr>
                        <h6 class="card-subtitle mb-2">R$ <?php echo e(number_format($product->price, 2,',','.')); ?></h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var a = new FgGallery('.ns', {
            cols: 4,
            style: {
                border: '0 solid #fff',
                height: '65px',
                borderRadius: '5px',
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/products/single.blade.php ENDPATH**/ ?>