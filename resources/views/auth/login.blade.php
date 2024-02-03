<!-- Vue Blade pour afficher les informations du profil -->

<html>
    <body>

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
        /* Style de base pour tous les champs de saisie */
input {
  box-sizing: border-box;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  outline: none;
  transition: border-color 0.3s;
  font-size: 16px;
}

/* Style spécifique pour la classe .inp */
.inp {
  background-color: #f8f8f8;
  color: #333;
  border-color: #ddd;
}

/* Effet de survol */
.inp:hover {
  border-color: #aaa;
}

/* Effet de focus */
.inp:focus {
  border-color: #b57611;
  box-shadow: 0 0 5px rgba(170, 103, 2, 0.5);
}

    </style>
</head>
<body>

<!-- Ajouter la classe centered-container pour centrer le contenu -->
<div class="centered-container">
    <div class="card">
        <h1>connexion :</h1> <br>

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-group">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">

            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

        </div>

        <div class="form-group">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

    </form>
    </div>
</div>

<!-- Modal pour le formulaire de modification -->


</body>
</html>




