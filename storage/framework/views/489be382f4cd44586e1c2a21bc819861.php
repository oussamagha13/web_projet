<?php $__env->startSection('content'); ?>
<section class="products">
    <h1 class="title"> details du <span>produit</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcommande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="commande">

        <img src="<?php echo e(asset('images/' . $pcommande->image)); ?>" alt="Image du produit" class="img-fluid rounded" style="width: 400px; height: 350px;">


        <div class="info">
           <table>
           <tr><td> <h3> Nom du Produit : </h3></td><td><input type="text" name="nomproduit" value="<?php echo e($pcommande->name); ?>" class="form-control" readonly></td></tr>
           <tr><td><p> Prix du Produit : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->prix); ?> DA" class="form-control" readonly></td></tr>
           <tr><td><p> Quantite : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->quantite); ?>" class="form-control" readonly></td></tr>
           <tr><td><p> type : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->type); ?>" class="form-control" readonly></td></tr>
           <tr><td><p> sous type : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->soustype); ?>" class="form-control" readonly></td></tr>

            <tr><td>  <p> Quantite Min : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->quantitemin); ?>" class="form-control" readonly></td></tr>
            <tr><td><p> Description : </p></td><td><input type="text" name="prix" value="<?php echo e($pcommande->description); ?>" class="form-control" readonly></td></tr>

            <br>
            </table>

            <br>



        </div>



    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</section>

<style>
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
    .action-btn {
        background-color: #3490dc;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .action-btn:hover {
        background-color: #603506;
    }
    .supprimer-btn {
        background-color: #e3342f;
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

<?php echo $__env->make('acceuil.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/acceuil/viewprod.blade.php ENDPATH**/ ?>