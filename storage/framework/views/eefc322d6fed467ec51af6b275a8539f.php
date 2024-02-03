<?php $__env->startSection('content'); ?>
    <title>livreur</title>


    <section class="products" style="margin-top: 2cm">
        <h1 class="title"> Vos <span>livraison </span> <a href="#"> >></a> </h1>
    <div class="conteneur-commandes">
        <?php $__currentLoopData = $com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="commande">
            <?php if($commande->product): ?>
            <img src="<?php echo e(asset('images/' . $commande->product->image)); ?>" alt="Image du produit" class="img-fluid rounded">
        <?php else: ?>
            <p>Produit non trouvé</p>
        <?php endif; ?>

            <div class="info">
                <form id="cartForm" action="<?php echo e(route('livreur.livrer')); ?>" method="POST" onsubmit="return confirm('Voulez-vous confirmer la livraison de cette commande ?')">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($commande->id); ?>">

                    <input type="hidden" name="id_commande" value="<?php echo e($commande->id_commande); ?>">
                    <input type="hidden" name="id_produit" value="<?php echo e($commande->id_produit); ?>">
                    <input type="hidden" name="id_art" value="<?php echo e($commande->id_art); ?>">


                    <table><tr> <td><h3> Nom du Produit : </h3></td><td><input type="text" name="nomproduit" value="<?php echo e($commande->nomproduit); ?>" class="form-control" readonly></td></tr>
              <tr><td>  <p>    Prix    :</p></td>  <td> <input type="text" name="prix" value="<?php echo e($commande->prix); ?>" class="form-control" readonly></td></tr>
               <tr><td> <p> Quantite  :</p></td><td> <input type="text" name="quantite" value="<?php echo e($commande->quantite); ?>" class="form-control" readonly></td></tr>
               <tr><td> <p> Adress Client :</p></td><td> <input type="text" name="adress_client" value="<?php echo e($commande->adress_client); ?>" class="form-control" readonly></td></tr>
               <tr><td>   <p> tele Client : </p></td> <td><input type="text" name="tele_client" value="<?php echo e($commande->tele_client); ?>" class="form-control" readonly></td></tr>

                <tr><td>  <p> Adress Artisan :</p></td><td> <input type="text" name="adress_art" value="<?php echo e($commande->adress_art); ?>" class="form-control" readonly></td></tr>
                    <tr><td>   <p> tele Artisan : </p></td> <td><input type="text" name="tele_art" value="<?php echo e($commande->tele_art); ?>" class="form-control" readonly></td></tr>
                    <tr><td> <p>   Etat : </p></td><td><input type="text" name="etat" value="<?php echo e($commande->etat); ?>" class="form-control2" readonly style="color:
                        <?php if($commande->etat == 'En traitement'): ?>
                            green
                        <?php elseif($commande->etat == 'Refuser'): ?>
                            red
                        <?php elseif($commande->etat == 'En cours'): ?>
                            orange
                        <?php elseif($commande->etat == 'livrer'): ?>
                            green
                        <?php else: ?>
                        brown
                        <?php endif; ?>;"></td></tr></table>

                <br>
                <button type="submit" class="accepte-btn action-btn ">
                   Commande Livrer
                </button>
                </form>
                <br>
                <div>


                <script>
                    function confirmerSuppression() {
                        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
                            document.getElementById('formSuppression').submit();
                        }
                    }
                </script>
                </div>


            </div>



        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

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

body{
    background: url('/image/chocolat-creme-fouettee-baies-gourmandes-gogo-generees-par-ia.jpg');
     background-size: cover;
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
            background-color: #b86206;
        }
        .supprimer-btn {
            background-color: #e3342f;
        }
        .accepte-btn{
            background-color: #4dd205;
        }
        .accepte-btn:focus {
      border-color: #e5e4e2c5;
      outline: none; /* Supprime l'outline par défaut */
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
      color: #00940f; /* Couleur de texte sombre */
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

<?php echo $__env->make('livreur.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/livreur/index.blade.php ENDPATH**/ ?>