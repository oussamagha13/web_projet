<?php $__env->startSection('content'); ?>
<title>Artisan</title>
<div class="box-container">

    <div class="box">
        <div class="icons">


        <div class="img">
            <img decoding="async" src="img/product-1.jpg" alt="">
        </div>
        <div style="margin-top: 0px; margin-left: 30px;">
            <a role="button" class="btn" href="<?php echo e(route('artisan.create')); ?>">create</a>
        </div>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e($message); ?>

        </div>
        <?php endif; ?>

        <section class="products">
            <h1 class="title"> Mes <span>Produits</span> <a href="#">view all >></a> </h1>
            <div class="box-container">
                <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="box">
                    <div class="icons">

                        <a href="<?php echo e(route('artisan.viewprod', ['id' => $item->id])); ?>" class="fas fa-eye"></a>

                        <a href="<?php echo e(route('artisan.edit', ['id' => $item->id])); ?>" class="fas fa-pencil-alt"></a>

                        <a href="#" class="fas fa-trash" onclick="deleteProduct(<?php echo e($item->id); ?>)"></a>

                        <div class="actions">
                            <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('produit.destroy', ['produit' => $item->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="submitForm('delete-form-<?php echo e($item->id); ?>')"></button>
                            </form>
                        </div>
                    </div>

                    <div class="img" style="text-align: center;">
                        <img decoding="async" src="<?php echo e(asset('images/' . $item->image)); ?>" alt="">
                    </div>
                    <div class="content">
                        <h3> nom : <?php echo e($item->name); ?></h3>
                        <div class="price"> Type :<?php echo e($item->type); ?></div>
                        <div class="price"> Prix :<?php echo e($item->prix); ?></div>
                        <div class="price">Quantite :<?php echo e($item->quantite); ?></div>
                        <div class="price">Quantite min:<?php echo e($item->quantitemin); ?></div>

                        <div class="stars">

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
</div>

<script>
    function submitForm(formId) {
        document.getElementById(formId).submit();
    }

    function deleteProduct(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById('delete-form-' + productId).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('artisan.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/artisan/index.blade.php ENDPATH**/ ?>