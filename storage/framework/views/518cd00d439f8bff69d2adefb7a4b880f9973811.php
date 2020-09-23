
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
            <div>
                <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mb-4">Criar produto</a>
                <?php if(isset($filter)): ?>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-link mb-4">Remover filtro</a>
                <?php endif; ?>
                <div class="float-right">
                    <form action="<?php echo e(route('admin.products.search')); ?>" class="float-right" method="POST">
                    <?php echo csrf_field(); ?>
                        Buscar
                        <input type="text" name="search" value="<?php echo e($search ?? ''); ?>"/>
                    </form>
                </div>
                
            </div>
            
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
                            <th style="width: 90px">Ordem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle">
                                <input type="checkbox" class="frontpage" product="<?php echo e($p->id); ?>" <?php if($p->frontpage == true): ?> checked <?php endif; ?>>  
                            </td>
                            <td class="align-middle">
                                <img src="<?php if(count($p->photos) > 0): ?> <?php echo e(asset('storage/'. $p->photos[0]->path)); ?>  <?php endif; ?>" class="img-fluid  img-thumbnail">
                            </td>
                            <td class="align-middle"><?php echo e($p->name); ?></td>
                            <td class="align-middle"><?php echo e($p->description); ?></td>
                            <td class="align-middle">R$ <?php echo e(number_format($p->price, 2, ",", "")); ?></td>
                            <td class="align-middle">
                                <?php $__currentLoopData = $p->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('admin.products.filter', ['category'=> $c->id])); ?>" >#<?php echo e($c->name); ?> </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="text-center align-middle">
                                <input type="number" value="<?php echo e($p->position); ?>" style="width: 50px">
                                <button class="btn btn-link position" product="<?php echo e($p->id); ?>">Salvar</button>
                            </td>
                            <td class="align-middle">
                                <div style="position: relative; display: inline-flex; vertical-align: middle;">
                                    <a href="<?php echo e(route('admin.products.edit', ['product'=> $p->id])); ?>" class="btn btn-sm mr-1 btn-primary" title="Editar"><i class="fas fa-pen"></i></a>
                                    <form action="<?php echo e(route('admin.products.destroy', ['product' => $p->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-sm btn-danger" title="Exculir"><i class="fas fa-trash-alt"></i></button>
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

<?php $__env->startSection('scriptsFoot'); ?>
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

        const position = document.querySelectorAll('.position')
        for(p of position){
            p.addEventListener('click', function(){
                let data = {
                    position: this.previousElementSibling.value,
                    product: this.getAttribute('product'),
                    _token: '<?php echo e(csrf_token()); ?>'
                }
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(route("admin.products.position")); ?>',
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