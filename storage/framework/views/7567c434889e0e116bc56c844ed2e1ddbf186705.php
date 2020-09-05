
<?php $__env->startSection('title'); ?>
    Sabrina MakeUp - Produtos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Editar Produto
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.products.update', ['product' => $product->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($product->name); ?>" name="name">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">  
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($product->description); ?>" name="description">
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">  
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="body">Corpo</label>
                    <textarea cols="30" rows="10" type="text" class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="body"><?php echo e($product->body); ?></textarea>
                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">  
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($product->price); ?>" name="price">
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">  
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="form-group">
                    <label for="filepond">Fotos</label>
                    <ul>
                        <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <label>
                                <input value="<?php echo e($photo->path); ?>" data-type="local" checked type="checkbox">
                                foo.jpeg
                            </label>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <input type="file" class="my-pond" name="filepond[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <!-- add to document <head> -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    <!-- add before </body> -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement, {maxFiles: 10,}   );
        const urlFilePond = '/sabrina/public/filepond/'; //alterar na versão final

        FilePond.setOptions({
            server: {
                process: {
                    url: urlFilePond + 'process',
                    method: 'POST',
                    withCredentials: false,
                    headers: {},
                    timeout: 7000,
                    onload: null,
                    onerror: null,
                    ondata: null
                },
                revert: (uniqueFileId, load, error) => {
                    let data = {
                        photo: uniqueFileId,
                    }
                    $.ajax({
                        type: 'DELETE',
                        url: urlFilePond + 'revert',
                        data: data,
                        dataType: 'json',
                        success: function(res){
                            //excludeIfInactive(res)
                        }
                    });

                    error('Erro');

                    load();
                },
                load: (source, load, error, progress, abort, headers) => {
                    <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        // Should request a file object from the server here
                        $.ajax({
                            type: 'GET',
                            url: urlFilePond + 'load/' + <?php echo e($photo->path); ?>,
                            dataType: 'json',
                            success: function(res){
                                console.log(res)
                            }
                        });
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    // Can call the error method if something is wrong, should exit after
                    error('oh my goodness');

                    // Can call the header method to supply FilePond with early response header string
                    // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/getAllResponseHeaders
                    headers(headersString);

                    // Should call the progress method to update the progress to 100% before calling load
                    // (endlessMode, loadedSize, totalSize)
                    progress(true, 0, 1024);

                    // Should call the load method with a file object or blob when done
                    load(file);

                    // Should expose an abort method so the request can be cancelled
                    return {
                        abort: () => {
                            // User tapped cancel, abort our ongoing actions here

                            // Let FilePond know the request has been cancelled
                            abort();
                        }
                    };
                }
            }
        });

        // function excludeIfInactive(id){
        //     setTimeout(){
        //         $.ajax({
        //             type: 'DELETE',
        //             url: urlFilePond + 'inactive',
        //             data: id,
        //             dataType: 'json',
        //         });
        //     }
        // } 
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sabrina\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>