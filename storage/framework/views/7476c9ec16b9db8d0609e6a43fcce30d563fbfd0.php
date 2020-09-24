
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php $count = 0; ?>
    <div class="col-md-12">
        <h2 class="font-weight-light mb-2">Produtos</h2>
        <hr>
        <div class="row">
            
            <div class="col-md-12 d-flex">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($count % 4 === 0): ?>
                        </div>
                        <div class="col-md-12 d-flex">
                    <?php endif; ?>
                    <div class="col-md-3 mb-4 a-card">
                        <a class="" href="<?php echo e(route('products.single', ['slug' => $p->slug])); ?>">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:150px" 
                                src="<?php if(isset($p->photos[0])): ?><?php echo e(asset('storage/'. $p->photos[0]->path)); ?>

                                        <?php else: ?> <?php echo e(asset('assets/img/sem-imagem.png')); ?><?php endif; ?>" 
                                alt="<?php echo e($p->description); ?>">
                                <div class="card-body">
                                    <h6 class="card-title"><?php echo e($p->name); ?></h6>
                                    <p class="card-text"><?php echo e($p->description); ?></p>
                                    <p class="card-text">R$ <?php echo e(number_format($p->price, 2, ',', '')); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/products/index.blade.php ENDPATH**/ ?>