
<?php $__env->startSection('title'); ?>
    Sabrina MakeUp - Categorias de Produtos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Categorias de Produtos
        </div>
        <div class="card-body">
            <a href="<?php echo e(route('admin.categories.products.create')); ?>" class="btn btn-primary mb-4">Criar produto</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($c->name); ?></th>
                            <th><?php echo e($c->description); ?></th>
                            <th>
                                <div class=btn-group>
                                    <a href="<?php echo e(route('admin.categories.products.edit', ['product'=> $c->id])); ?>" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="<?php echo e(route('admin.categories.products.destroy', ['product' => $c->id])); ?>" method="post">
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
                <?php echo e($categories->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/admin/product_category/index.blade.php ENDPATH**/ ?>