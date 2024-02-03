
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyOOBtFiQozz5Dqj3oY6b7DkUk9TIq0Dxn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



</head>
<body>

<header class="header">
    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> cake </a>
    <nav class="navbar">
        <a href="">Home</a>
        <a href="#">About</a>





            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))

                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @endif

                    @if (Route::has('register'))

                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @endif
                @else

                <a id="navbarDropdown" class="fas fa-user fa-3x" href="" role="button" >
                    <span>{{ Auth::user()->name }}</span>
                  </a>



    </nav>
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>

        <div id="search-icon" class="fas fa-search" onclick="toggleFormulaireRecherche()"></div>

<!-- Formulaire de recherche caché -->
<form id="formRecherche" class="hidden" action="{{ route('client.recherche') }}" method="GET">
    <div class="form-group">
        <label for="critere">Choisissez le critère de recherche :</label>
        <select name="critere" id="critere" class="form-control2">
            <option value="nom">Nom</option>
            <option value="adresse">Adresse</option>
            <option value="artisan">artisan</option>
            <option value="evaluation">Évaluation</option>
        </select>
    </div>
    <div class="form-group">
        <label for="terme">Entrez votre recherche :</label>
        <input type="text" name="terme" id="terme" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>


        <div id="modal-container" class="modal-container" onclick="hideMesCommandes()">
            <!-- Contenu de la fenêtre modale -->
        </div>


        <a href="{{ route('client.profile') }}" style="text-decoration: none; color: white; margin-left: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="7" r="4"></circle>
              <path d="M12 11c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8 8h-1"></path>
              <path d="M21 21v-1c0-4.42-3.58-8-8-8s-8 3.58-8 8v1"></path>
            </svg>
          </a>

        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <div id="login-btn" class="fas fa-user"></div>

     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
     <div id="modal-container" class="modal-container">
        <!-- Contenu de la fenêtre modale -->
        <div id="modal-content" class="modal-content">
            <!-- Le contenu des commandes sera injecté ici -->
        </div>
    </div>


@endguest






    </div>
</header>

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

@yield('content')
<script>


</script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        var loginBtn = document.getElementById('login-btn');

        // Vérifier si l'utilisateur est authentifié
        var isAuthenticated = {!! json_encode(Auth::check()) !!};

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

