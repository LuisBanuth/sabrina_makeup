
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
            <?php if(isset($filter)): ?>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="right btn btn-link mb-4">Remover filtro</a>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Destaque</th>
                            <th style="width: 120px">Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Categorias</th>
                            <th>Ordem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="frontpage" product="<?php echo e($p->id); ?>" <?php if($p->frontpage == true): ?> checked <?php endif; ?>>  
                            </td>
                            <td>
                                <img src="<?php if(count($p->photos) > 0): ?> <?php echo e(asset('storage/'. $p->photos[0]->path)); ?>  <?php endif; ?>" class="img-fluid  img-thumbnail">
                            </td>
                            <td><?php echo e($p->name); ?></td>
                            <td><?php echo e($p->description); ?></td>
                            <td>R$ <?php echo e(number_format($p->price, 2, ",", "")); ?></td>
                            <td>
                                <?php $__currentLoopData = $p->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('admin.products.filter', ['category'=> $c->id])); ?>" >#<?php echo e($c->name); ?> </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($p->position); ?></td>
                            <td>
                                <div class=btn-group>
                                    <a href="<?php echo e(route('admin.products.edit', ['product'=> $p->id])); ?>" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="<?php echo e(route('admin.products.destroy', ['product' => $p->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </tbody>
                </table>
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        const frontpage = document.querySelectorAll('.frontpage')

        for(f of frontpage){
            f.addEventListener('click', function(){
                let data = {
                    status: this.checked,
                    product: this.getAttribute('product'),
                    _token: '<?php echo e(csrf_token()); ?>'
                }
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(route("admin.products.frontpage")); ?>',
                    data: data,
                    dataType: 'json',
                    success: function(res){

                    }
                })
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina_makeup\resources\views/admin/product/index.blade.php ENDPATH**/ ?>