<!-- Vue Blade pour afficher les informations du profil -->


<?php $__env->startSection('content'); ?>


    <title>Profil</title>

    <style>
        /* Ajouter une classe spécifique pour centrer le contenu */
body{
    background-color: #833517;
}
        .centered-container {

            background: url('/image/chocolat-creme-fouettee-baies-gourmandes-gogo-generees-par-ia.jpg');
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {

            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(178, 79, 4, 0.644);
            padding: 20px;
            max-width: 450px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            font-size: 18px;
        }

        p {
            font-size: 14px;
            margin: 0;
            padding: 8px 0;
            color: #666;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #editProfileModal {
            display: none;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        #editProfileModal .modal-card {
            width: auto;
            width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        #editProfileModal .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #888;
        }

        #editProfileModal form {
            padding: 20px;
        }

        #editProfileModal button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #editProfileModal button:hover {
            background-color: #218838;
        }
        h1{
            text-align: center;
            font-size: 2.5rem;
            margin: 0;
            letter-spacing: 2px; /* Espacement entre les lettres */
            text-transform: uppercase;
            padding: 2rem;
            background-color:#833517; /* Couleur de fond du titre */
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Ajouter la classe centered-container pour centrer le contenu -->
<div class="centered-container">
    <div class="card">
        <h1>iNFO DU Profile</h1> <br>
        <div class="form-group">
            <label for="name">Nom :</label>
            <p id="name"><?php echo e($user->name); ?></p>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <p id="email"><?php echo e($user->email); ?></p>
        </div>

        <div class="form-group">
            <label for="adress">Adresse :</label>
            <p id="adress"><?php echo e($user->adress); ?></p>
        </div>

        <div class="form-group">
            <label for="tele">Téléphone :</label>
            <p id="tele"><?php echo e($user->tele); ?></p>
        </div>

        <div class="form-group">
            <label for="tele">Heure d'Ouverture :</label>
            <p id="tele"><?php echo e($user->heure_douverture); ?></p>
        </div>

        <div class="form-group">
            <label for="tele">Type de Produit :</label>
            <p id="tele"><?php echo e($user->type_produit); ?></p>
        </div>

        <div class="form-group">
            <label for="tele">Description :</label>
            <p id="tele"><?php echo e($user->description); ?></p>
        </div>

        <button type="button" onclick="openEditModal()">Modifier</button>
    </div>
</div>

<!-- Modal pour le formulaire de modification -->
<div id="editProfileModal">
    <div class="modal-card">
        <div class="modal-close" onclick="closeEditModal()">×</div>
        <form method="post" action="<?php echo e(route('profileart.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo e($user->email); ?>">
            </div>

            <div class="form-group">
                <label for="adress">Adresse :</label>
                <input type="text" id="adress" name="adress" value="<?php echo e($user->adress); ?>">
            </div>

            <div class="form-group">
                <label for="tele">Téléphone :</label>
                <input type="text" id="tele" name="tele" value="<?php echo e($user->tele); ?>">
            </div>

            <div class="form-group">
                <label for="tele">Heure d'Ouverture:</label>
                <input type="text" id="heure_douverture" name="heure_douverture" value="<?php echo e($user->heure_douverture); ?>">
            </div>


            <div class="form-group">
                <label for="type_produit">Type de Produit :</label>
                <select class="select-wrapper" id="type_produit" name="type_produit">
                    <option value="sucre">sucre</option>
                    <option value="sale">sale</option>
                    <option value="sucre/sale">sucre/sale</option>

                </select>
             </div>

            <div class="form-group">
                <label for="tele">Description :</label>
                <input type="text" id="description" name="description" value="<?php echo e($user->description); ?>">
            </div>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
</div>

<script>
    function openEditModal() {
        document.getElementById('editProfileModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editProfileModal').style.display = 'none';
    }
</script>

</body>
</html>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('artisan.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/artisan/profile.blade.php ENDPATH**/ ?>