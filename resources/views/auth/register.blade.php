<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> iscription </title>

    <!-- Inclure les liens Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


    <div class="container mt-5">
        <h1 class="text-center">Bienvenue dans notre Site </h1>

        <form id="formPrincipal" class="mt-4">
            <div class="form-group">
                <label for="choix">Vous etes :</label>
                <select id="choix" name="choix" class="form-control">
                    <option value="option1">Artisan</option>
                    <option value="option2">Client</option>
                    <option value="option3">Livreur</option>
                </select>
            </div>
        </form>

        <!-- Artisan -->
        <div id="formOption1" style="display: none;">
            <h2 class="mt-4">Formulaire d' Artisan</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom Entreprise') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                    <div class="col-md-6">
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>

                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="heure_douverture" class="col-md-4 col-form-label text-md-right">{{ __('Heure d ouverture') }}</label>

                    <div class="col-md-6">
                        <input type="text" id="heure_douverture" name="heure_douverture" class="form-control" value="9h00 - 17h00" required autocomplete="9h00 - 17h00" autofocus>

                        @error('heure_douverture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tele" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                    <div class="col-md-6">
                        <input id="tele" type="text" class="form-control @error('tele') is-invalid @enderror" name="tele" value="{{ old('tele') }}" required autocomplete="tele" autofocus>

                        @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="role_id" type="hidden" class="form-control" name="role_id" value="1">


                    </div>
                </div>


                <div class="form-group row">
                    <label for="type_produit" class="col-md-4 col-form-label text-md-right">{{ __('Type de Produit') }}</label>

                    <div class="col-md-6">

                        <select class="form-control" id="exampleSelect" name="type_produit">
                            <option value="sucre">sucre</option>
                            <option value="sale">sale</option>
                            <option value="sucre/sale">sucre/sale</option>
                        </select>

                        @error('type_produit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Saisissez votre description ici..."></textarea>

                        @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

                <!-- Client -->
        <div id="formOption2" style="display: none;">
            <h2 class="mt-4">Inscription Consormateur</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom Complet') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                    <div class="col-md-6">
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>

                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tele" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                    <div class="col-md-6">
                        <input id="tele" type="text" class="form-control @error('tele') is-invalid @enderror" name="tele" value="{{ old('tele') }}" required autocomplete="tele" autofocus>

                        @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="role_id" type="hidden" class="form-control" name="role_id" value="2">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="heure_douverture" type="hidden" class="form-control" name="heure_douverture">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="type_produit" type="hidden" class="form-control" name="type_produit">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="description" type="hidden" class="form-control" name="description">


                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <!-- livreur -->

        <div id="formOption3" style="display: none;">
            <h2 class="mt-4">Inscription Livreur</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('adress') }}</label>

                    <div class="col-md-6">
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>

                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tele" class="col-md-4 col-form-label text-md-right">{{ __('tele') }}</label>

                    <div class="col-md-6">
                        <input id="tele" type="text" class="form-control @error('tele') is-invalid @enderror" name="tele" value="{{ old('tele') }}" required autocomplete="tele" autofocus>

                        @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="role_id" type="hidden" class="form-control" name="role_id" value="3">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="heure_douverture" type="hidden" class="form-control" name="heure_douverture">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="type_produit" type="hidden" class="form-control" name="type_produit">


                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="description" type="hidden" class="form-control" name="description">


                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

    <script>
        var selectElement = document.getElementById('choix');
        var formOption1 = document.getElementById('formOption1');
        var formOption2 = document.getElementById('formOption2');
        var formOption3 = document.getElementById('formOption3');

        selectElement.addEventListener('change', function() {
            var selectedOption = selectElement.value;

            // Cacher tous les formulaires au début
            formOption1.style.display = 'none';
            formOption2.style.display = 'none';
            formOption3.style.display = 'none';

            // Afficher le formulaire correspondant à l'option sélectionnée
            if (selectedOption === 'option1') {
                formOption1.style.display = 'block';
            } else if (selectedOption === 'option2') {
                formOption2.style.display = 'block';
            } else if (selectedOption === 'option3') {
                formOption3.style.display = 'block';
            }
        });
    </script>
<style>


    body{
    background: url('/image/home-bg1.jpg');
     background-size: cover;
}
</style>
</body>
</html>
