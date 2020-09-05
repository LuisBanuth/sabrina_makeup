
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
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Corpo</th>
                        <th>Preço</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($p->name); ?></th>
                            <th><?php echo e($p->description); ?></th>
                            <th><?php echo e($p->body); ?></th>
                            <th><?php echo e($p->price); ?></th>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina\sabrina\resources\views/admin/product/index.blade.php ENDPATH**/ ?>