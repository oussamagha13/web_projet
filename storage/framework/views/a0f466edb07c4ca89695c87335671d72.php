
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title></title>
</head>
<body>

<header class="header">
    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> cake </a>
    <nav class="navbar">
        <a href="<?php echo e(route('artisan.index')); ?>">Acceuil</a>
        <a href="<?php echo e(route('artisan.gestioncom')); ?>">Gestion des Commandes</a>
        <a href="<?php echo e(route('artisan.index')); ?>">Gestion des Produits</a>





            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <?php if(Route::has('login')): ?>

                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>

                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>

                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>

                    <?php endif; ?>
                <?php else: ?>

                        <a id="navbarDropdown" class="fas fa-user fa-3x" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span><?php echo e(Auth::user()->name); ?></span>
                        </a>




    </nav>

    <div class="icons">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="<?php echo e(route('artisan.profile')); ?>" style="text-decoration: none; color: white; margin-left: 8px;">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="7" r="4"></circle>
              <path d="M12 11c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8 8h-1"></path>
              <path d="M21 21v-1c0-4.42-3.58-8-8-8s-8 3.58-8 8v1"></path>
            </svg>
          </a>

        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <div id="login-btn" class="fas fa-user"></div>

     </a>

     <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
         <?php echo csrf_field(); ?>
     </form>


<?php endif; ?>






    </div>
</header>
<nav class="nv">
    <a href="<?php echo e(route('artisan.index', 1)); ?>" class="page-link <?php if(request()->routeIs('artisan.index')): ?> selected <?php endif; ?>">salé/sucre</a>
    <a href="<?php echo e(route('artisan.sucre', 2)); ?>" class="page-link <?php if(request()->routeIs('artisan.sucre')): ?> selected <?php endif; ?>">sucré</a>
    <a href="<?php echo e(route('artisan.sale', 3)); ?>" class="page-link <?php if(request()->routeIs('artisan.sale')): ?> selected <?php endif; ?>">salé</a>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var loginBtn = document.getElementById('login-btn');

        // Vérifier si l'utilisateur est authentifié
        var isAuthenticated = <?php echo json_encode(Auth::check()); ?>;

        // Définir l'icône en fonction de l'authentification
        updateIcon();

        // Ajouter un gestionnaire de clic à l'icône
        loginBtn.addEventListener('click', function () {
            // Si l'utilisateur est authentifié, effectuer la déconnexion
            if (isAuthenticated) {
                document.getElementById('logout-form').submit();
            } else {
                // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
                window.location.href = "utilisateur/connexion";
            }
        });

        // Fonction pour mettre à jour l'icône en fonction de l'authentification
        function updateIcon() {
            loginBtn.classList.remove('fa-user', 'fa-sign-out-alt');

            if (isAuthenticated) {
                loginBtn.classList.add('fa-sign-out-alt');
            } else {
                loginBtn.classList.add('fa-user');
            }
        }
    });
</script>

</body>
</html>

<?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/artisan/layout.blade.php ENDPATH**/ ?>