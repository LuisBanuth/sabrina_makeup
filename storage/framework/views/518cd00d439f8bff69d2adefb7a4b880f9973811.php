
<?php $__env->startSection('title'); ?>
    Sabrina MakeUp - Produtos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Produtos
        </div>
        <div class="card-body">
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mb-4">Criar produto</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 120px">Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Categorias</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th>
                                <img src="<?php if(count($p->photos) > 0): ?> <?php echo e(asset('storage/'. $p->photos[0]->path)); ?>  <?php endif; ?>" class="img-fluid  img-thumbnail">
                            </th>
                            <th><?php echo e($p->name); ?></th>
                            <th><?php echo e($p->description); ?></th>
                            <th>R$ <?php echo e(number_format($p->price, 2, ",", "")); ?></th>
                            <th>
                                <?php $__currentLoopData = $p->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    #<?php echo e($c->name); ?> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </th>
                            <th>
                                <div class=btn-group>
                                    <a href="<?php echo e(route('admin.products.edit', ['product'=> $p->id])); ?>" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="<?php echo e(route('admin.products.destroy', ['product' => $p->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </tbody>
                </table>
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/admin/product/index.blade.php ENDPATH**/ ?>