<?php $__env->startSection('content'); ?>
<section class="products">
    <h1 class="title"> details du <span>produit</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcommande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="commande">

        <img src="<?php echo e(asset('images/' . $pcommande->image)); ?>" alt="Image du produit" class="img-fluid rounded">


        <div class="info">
           <table>
           <tr><td> <h3> Nom du Produit : </h3></td><td><input type="text" name="nomproduit" value="<?php echo e($pcommande->name); ?>" class="form-control" readonly></td></tr>
           <tr><td><p> Prix du Produit : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->prix); ?>" class="form-control" readonly></td></tr>
           <tr><td>  <p> Quantite : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->quantite); ?>" class="form-control" readonly></td></tr>

           <tr><td>  <p> Quantite Min : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->quantitemin); ?>" class="form-control" readonly></td></tr>
            <tr><td>  <p> Type : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->type); ?>" class="form-control" readonly></td></tr>
            <tr><td>  <p> Sous Type : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->typesous); ?>" class="form-control" readonly></td></tr>
            <tr><td>  <p> Description : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->description); ?>" class="form-control" readonly></td></tr>

            <br>
            </table>


            <br>
            <a href="<?php echo e(route('artisan.edit', ['id' => $pcommande->id])); ?>">
            <button type="submit" class="accepte-btn action-btn ">
                Modifier
            </button>
            </a>
            <a href="" onclick="deleteProduct(<?php echo e($pcommande->id); ?>)">
                <button type="submit" class="supprimer-btn action-btn ">
                    Suprimer
                </button>
                </a>
                <div class="actions">
                    <form id="delete-form-<?php echo e($pcommande->id); ?>" action="<?php echo e(route('produit.destroy', ['produit' => $pcommande->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" onclick="submitForm('delete-form-<?php echo e($pcommande->id); ?>')"></button>
                    </form>
                </div>
        </div>



    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<h1 class="title" > Les Commandes du <span>produit</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    <?php $__currentLoopData = $listcom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcommande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="commande">

        <div class="info">
           <table>
           <tr><td> <h3> Commande num : </h3></td><td><input type="text" name="nomproduit" value="<?php echo e($pcommande->id); ?>" class="form-control" readonly></td></tr>

            <tr><td>  <p> Quantite : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->quantite); ?>" class="form-control" readonly></td></tr>
            <tr><td>  <p> Prix : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->prix); ?>" class="form-control" readonly></td></tr>

            <tr><td>  <p> date: </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->date); ?>" class="form-control" readonly></td></tr>

            <tr><td>  <p> Etat : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->etat); ?>" class="form-control2" readonly style="color:
                <?php if($pcommande->etat == 'En traitement'): ?>
                    green
                <?php elseif($pcommande->etat == 'Refuser'): ?>
                    red
                <?php elseif($pcommande->etat == 'En cours'): ?>
                    orange
                <?php elseif($pcommande->etat == 'livrer'): ?>
                    green
                <?php else: ?>
                brown
                <?php endif; ?>;"></td></tr>

            <br>
            </table>

            <br>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<style>

.title {
    display:flex;
    align-items: center;
    font-size: 2.5rem;
    margin-bottom:3rem;
    padding:1.2rem 0;
    border-bottom: 0.1rem solid rgba(236, 232, 232, 0.7);
    color: #fff2f2;
}
.title span{
    color: #c2b3b3;
    padding-left: .7rem;
}

.products{
    background: url('/image/chocolat-creme-fouettee-baies-gourmandes-gogo-generees-par-ia.jpg');
     background-size: cover;
}

    .action-btn {
        background-color: #0589bd;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .action-btn:hover {
        background-color: #b86507;
    }
    .supprimer-btn {
        background-color: #e3342f;
    }
    .accepte-btn{
        background-color: #076bb2;
    }
    .accepte-btn:focus {
  border-color: #e5e4e2c5;
  outline: none; /* Supprime l'outline par défaut */
}
    .form-control2{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #eaeaea; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }



    .supprimer-btn:focus {
  border-color: #e5e4e2c5;
  outline: none; /* Supprime l'outline par défaut */
}
    .form-control{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  color: #ffffff; /* Couleur de texte sombre */
  background-color: #b24d00; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }
    .form-control2{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #eaeaea; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }
    .conteneur-commandes {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 2cm;

    }

    .commande {
        background-color: rgba(237, 240, 242, 0.805);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .commande:hover {
        transform: scale(1.05);
    }

    img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .info {
        margin-left: 20px;
        text-align: left;
    }

    /* Style pour le nom du médecin */
    .commande h3 {
        margin: 0;
        font-size: 20px;
        font-weight: bold;
        color: #333333;
    }

    /* Style pour le prénom du médecin */
    .commande p {
        margin: 0;
        font-size: 18px;
        color: #666666;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('artisan.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/artisan/viewprod.blade.php ENDPATH**/ ?>