<?php $__env->startSection('content'); ?>

<title>acceuil</title>

<section class="home" id="home">
    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span>Contient Different Produit</span>
                <h3>Sucré</h3>
                <a href="<?php echo e(route('acceuil.sucre')); ?>" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="image/home-img-1.png" alt="" style="width: 600px; height: 350px;">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Contient Different Produit</span>
                <h3> Salé</h3>
                <a href="<?php echo e(route('acceuil.sale')); ?>" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="image/Pizza-Slice-PNG-Transparent-Image1.png" alt="" style="width: 600px; height: 350px;">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>La Disponibilité</span>
                <h3>Du Livraison !</h3>
                <a href="<?php echo e(route('login')); ?>" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="image/clipart676506.png" alt="" style="width: 600px; height: 350px;">

            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Contient Different Produit</span>
                <h3>Sucré</h3>
                <a href="<?php echo e(route('acceuil.sucre')); ?>" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="image/home-img-2.png" alt="" style="width: 600px; height: 350px;">

            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Contient Different Produit</span>
                <h3> Salé</h3>
                <a href="<?php echo e(route('acceuil.sale')); ?>" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="image/pngwing.com (1).png" alt="" style="width: 600px; height: 350px;">
            </div>
        </div>

    </div>
    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

</section>

<style>
    .home{
    padding-top: 14rem;
    background: url(image/home-bg1.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
}
</style>
<script>
    function simulerClic() {
        document.getElementById("prev-slide").click();
    }

    // Appel de la fonction toutes les 3 secondes
    setInterval(simulerClic, 20000);

    let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}
</script>

<div class="box-container" style="margin-top: 0px;">

    <div class="box" style="margin-top: 0px;">


        <div class="img">
            <img decoding="async" src="img/product-1.jpg" alt="">
        </div>
        <div style="margin-top: 0px; margin-left: 30px;">
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

                            <a href="<?php echo e(route('acceuil.viewprod', ['id' => $item->id])); ?>" class="fas fa-eye"></a>

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

<!-- Ajoutez ces lignes dans la section scripts -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('acceuil.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/acceuil/index.blade.php ENDPATH**/ ?>