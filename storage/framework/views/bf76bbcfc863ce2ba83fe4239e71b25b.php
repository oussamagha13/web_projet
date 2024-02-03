<?php $__env->startSection('content'); ?>
<title>Produit Sucre</title>
<div class="box-container">

    <div class="box">


        <div class="img">
            <img decoding="async" src="img/product-1.jpg" alt="">
        </div>
        <div style="margin-top: 50px; margin-left: 30px;">
        </div>
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

        <section class="products">
            <h1 class="title"> our <span>products</span> <a href="#">view all >></a> </h1>
            <div class="box-container">
                <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="box">
                        <div class="icons">
                            <!-- Lien pour afficher le formulaire moderne -->
                            <a href="<?php echo e(route('login')); ?>" class="fas fa-shopping-cart" onclick="showCartForm('<?php echo e($item->name); ?>', '<?php echo e($item->prix); ?>')"></a>

                            <a href="#" class="fas fa-eye"></a>

                            <a href="<?php echo e(route('login')); ?>" class="fas fa-star"></a>

                            <div class="actions">

                            </div>
                        </div>

                        <div class="img" style="text-align: center;">
                            <img decoding="async" src="<?php echo e(asset('images/' . $item->image)); ?>" alt="">
                        </div>
                        <div class="content">
                            <h3> nom : <?php echo e($item->name); ?></h3>
                            <div class="price"> Prix :<?php echo e($item->prix); ?></div>
                            <div class="price">Quantite :<?php echo e($item->quantite); ?></div>
                            <div class="stars">

                                <?php if($item->evaluations->count() > 0): ?>
                                <h3>Évaluations :</h3>


                                <!-- Afficher la moyenne des évaluations sous forme d'étoiles -->
                                <?php
                                    $averageRating = $item->evaluations->avg('rating');
                                ?>

                                <div>

                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= round($averageRating)): ?>
                                            <span class="fas fa-star"></span>
                                        <?php else: ?>
                                            <span class="far fa-star"></span>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>

                            <?php else: ?>
                            <h3>Évaluations :</h3>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <!-- Section pour afficher le formulaire moderne -->
        <div id="cartFormContainer" class="cart-form-container">

        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('acceuil.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/acceuil/sucre.blade.php ENDPATH**/ ?>