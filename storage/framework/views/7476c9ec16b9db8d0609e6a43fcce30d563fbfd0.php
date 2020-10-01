
<?php $__env->startSection('content'); ?>
<style>
    .list-group-item{
        background-color: #2b2924;
        color: bisque;
    }
    .list-group-item:hover{
      background-color: #675d44;
    }

    .pagination .active span{
        color: bisque;
        background-color: #675d44 !important;
    }
    .pagination span, .pagination a {
        color: bisque;
        background-color: #2b2924 !important;
    }
    .pagination .active span:hover, .pagination span:hover, .pagination a:hover {
        background-color: #80745c !important;
    }
</style>
<div class="container">
    <?php $count = 0; ?>
    <h2 class="mb-2 mt-4">Produtos</h2>
        <hr>
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-3 bd-sidebar p-0">
                <div class="a-card card">
                    <ul class="list-group list-group-flush">
                        <a href="<?php echo e(route('products.index')); ?>">
                            <li class="list-group-item">
                                Todos
                            </li>
                        </a>
                        <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.filter', ['category'=>$pc->id])); ?>">
                            <li class="list-group-item">
                                <?php echo e($pc->name); ?>

                            </li>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                    
            </div>

            <div class="col-md-9 mb-2 p-0">
                <h4 class="ml-4"><?php if(isset($category)): ?><?php echo e($category->name); ?><?php else: ?> Todos os Produtos <?php endif; ?></h4>
                <div class="col-md-12 d-flex">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($count % 4 === 0 && $count !== 0): ?>
                            </div>
                            <div class="col-md-12 d-flex">
                        <?php endif; ?>
                        <div class="col-md-3 a-card p-1">
                            <a class="" href="<?php echo e(route('products.single', ['slug' => $p->slug])); ?>">
                                <div class="card">
                                    <img class="card-img-top img-fluid" style="height:150px" 
                                    src="<?php if(isset($p->photos[0])): ?><?php echo e(asset('storage/'. $p->photos[0]->path)); ?>

                                            <?php else: ?> <?php echo e(asset('assets/img/sem-imagem.png')); ?><?php endif; ?>" 
                                    alt="<?php echo e($p->description); ?>">
                                    <div class="card-body">
                                        <h6 class="card-title mb-1"><?php echo e($p->name); ?></h6>
                                        <p class="card-text "><?php echo e($p->description); ?></p>
                                        <p class="card-text">R$ <?php echo e(number_format($p->price, 2, ',', '')); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6 m-auto text-center">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/products/index.blade.php ENDPATH**/ ?>