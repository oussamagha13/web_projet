<?php $__env->startSection('content'); ?>
    <title>Client</title>
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
                    <?php $__currentLoopData = $resultats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="box">
                            <div class="icons">
                                <!-- Lien pour afficher le formulaire moderne -->
                                <a href="#" class="fas fa-shopping-cart" onclick="showCartForm('<?php echo e($item->name); ?>', '<?php echo e($item->prix); ?>', '<?php echo e($item->id); ?>', '<?php echo e($item->id_art); ?>')"></a>

                                <a href="#" class="fas fa-eye"></a>

                                <a href="#" class="fas fa-star" onclick="showEvaluationForm('<?php echo e($item->name); ?>', '<?php echo e($item->prix); ?>', '<?php echo e($item->id); ?>', '<?php echo e($item->id_art); ?>')"></a>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    <script>
        function showCartForm(name, price, id_produit, id_art) {
            // Utilisation de SweetAlert pour créer un formulaire moderne
            Swal.fire({
                title: '<h2>Ajouter au panier</h2>',
                html: `
                    <!-- Votre formulaire moderne ici -->
                    <form id="cartForm" action="<?php echo e(route('panier.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <!-- Champ caché pour le nom du produit -->
                        <input type="hidden" name="nomproduit" value="${name}">
                        <!-- Champ caché pour le prix du produit -->
                        <input type="hidden" name="id_produit" value="${id_produit}">
                        <input type="hidden" name="prix" value="${price}">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="id_art" value="${id_art}">

                        <div>
                            <h2>Nom du produit: ${name} </h2>
                        </div>
                        <div>
                            <h2>Prix du produit: ${price}</h2>
                        </div>
                        <div>
                            <h2 style="text-align:center">Quantité: <input type="text" name="quantite" value="1" size="4"></h2>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                    </form>
                `,
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Logique à exécuter avant de soumettre le formulaire
                    // Vous pouvez ajouter du code ici si nécessaire
                }
            });
        }

        function showEvaluationForm(name, price, id_produit, id_art) {
            // Utilisation de SweetAlert pour créer un formulaire moderne
            Swal.fire({
                title: '<h3>Évaluez ce produit</h3>',
                html: `
                <form action="<?php echo e(route('evaluations.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div>
        <input type="hidden" name="id_produit" value="${id_produit}">

        <div class="rating-container">
            <span class="star" onclick="handleStarClick(1)">&#9733;</span>
            <span class="star" onclick="handleStarClick(2)">&#9733;</span>
            <span class="star" onclick="handleStarClick(3)">&#9733;</span>
            <span class="star" onclick="handleStarClick(4)">&#9733;</span>
            <span class="star" onclick="handleStarClick(5)">&#9733;</span>
        </div>
        <input type="hidden" id="ratingInput" name="rating" value="0">
        <label for="comment" class="form-label">Commentaire</label>
        <textarea name="comment" id="comment" rows="4" class="form-textarea"></textarea>

        <button type="submit" class="submit-btn">Soumettre l'évaluation</button>
    </div>
</form>


                `,
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Logique à exécuter avant de soumettre le formulaire
                    // Vous pouvez ajouter du code ici si nécessaire
                }
            });
        }
    </script>

<script>
    function handleStarClick(rating) {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        resetStars();

        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('active');
        }

        ratingInput.value = rating;
    }

    function resetStars() {
        const stars = document.querySelectorAll('.star');

        stars.forEach((star) => {
            star.classList.remove('active');
        });
    }
</script>



<style>
     .form-label {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }

        .form-textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #2186c4;
        }
 .rating-container {
            display: flex;
            flex-direction: row;
            font-size: 24px;
        }

        .star {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        .star.active {
            color: gold;
        }

        .submit-btn {
            margin-top: 10px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
        }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/client/rchparnom.blade.php ENDPATH**/ ?>