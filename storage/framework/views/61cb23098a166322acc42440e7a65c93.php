
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

</head>
<body>

<header class="header">
    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Food Shop </a>
    <nav class="navbar">
        <a href="<?php echo e(route('acceuil.index')); ?>">Acceuil</a>

        <a href="#">About</a>





            <a href="<?php echo e(route('register')); ?>">Inscription </a>


    </nav>
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>

        <!-- Icône de recherche -->
<div id="search-icon" class="fas fa-search" onclick="toggleFormulaireRecherche()"></div>

<!-- Formulaire de recherche caché -->
<form id="formRecherche" class="hidden" action="<?php echo e(route('acceuil.recherche')); ?>" method="GET">
    <div class="form-group">
        <label for="critere">Choisissez le critère de recherche :</label>
        <select name="critere" id="critere" class="styled-select">
            <option value="nom">Nom</option>
            <option value="adresse">Adresse</option>
            <option value="artisan">artisan</option>
            <option value="evaluation">Évaluation</option>
            <option value="prix">Prix</option>
        </select>
    </div>
    <div class="form-group">
        <label for="terme">Entrez votre recherche :</label>
        <input type="text" name="terme" id="terme" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>



        <div id="cart-btn" class="fas fa-shopping-cart"></div>

        <a href="<?php echo e(route('login')); ?>"> <div id="login-btn" class="fas fa-user"></div></a>
        <div></div>
    </div>
</header>
<nav class="nv">
    <a href="<?php echo e(route('acceuil.index', 1)); ?>" class="page-link <?php if(request()->routeIs('acceuil.index')): ?> selected <?php endif; ?>">salé/sucre</a>
    <a href="<?php echo e(route('acceuil.sucre', 2)); ?>" class="page-link <?php if(request()->routeIs('acceuil.sucre')): ?> selected <?php endif; ?>">sucré</a>
    <a href="<?php echo e(route('acceuil.sale', 3)); ?>" class="page-link <?php if(request()->routeIs('acceuil.sale')): ?> selected <?php endif; ?>">salé</a>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pageLinks = document.querySelectorAll('.page-link');

        // Fonction pour définir la classe "selected" en fonction de la page courante
        function updateSelectedLink() {
            var currentPath = window.location.pathname;

            pageLinks.forEach(function(link) {
                var linkPath = new URL(link.href).pathname;

                if (currentPath === linkPath) {
                    link.classList.add('selected');
                } else {
                    link.classList.remove('selected');
                }
            });
        }

        // Appeler la fonction au chargement de la page
        updateSelectedLink();
    });
</script>
<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Gestionnaire de clic sur l'icône de recherche
        $('#search-icon').click(function() {
            $('#formRecherche').toggleClass('hidden');
        });

        // Gestionnaire de clic sur le document
        $(document).click(function(event) {
            // Vérifiez si le clic est en dehors du formulaire de recherche et de l'icône de recherche
            if (!$(event.target).closest('#formRecherche, #search-icon').length) {
                $('#formRecherche').addClass('hidden');
            }
        });
    });
</script>


<style>
    .styled-select {
    /* Vos styles ici */
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styles supplémentaires pour le survol ou l'état actif si nécessaire */
.styled-select:hover {
    background-color: #f0f0f0;
}

.styled-select:active {
    border-color: #1a1a1a;
}

    #search-icon {
        cursor: pointer;
    }
    .form-control2{
        color: #333;
    }

    #formRecherche {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        background-color: #b35702d5;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        transform-origin: top right;
    }

    #formRecherche.hidden {
        transform: scale(0);
        visibility: hidden;
    }
</style>

<style>


    body {

    }



    .nv {
      display: flex; /* Utilisation de flex pour mettre les liens côte à côte */
      align-items: center;
      justify-content: center;

    }

    .page-link {
        margin-top: 2cm;
      background-color: #833517;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px; /* Ajout d'une marge entre les liens si nécessaire */
    }

    .page-link:hover {
      background-color: #a06645;
    }

    .page-link.selected {
      background-color: #333;
    }




      </style>

<?php echo $__env->yieldContent('content'); ?>


</body>
</html>

<?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/acceuil/layout.blade.php ENDPATH**/ ?>