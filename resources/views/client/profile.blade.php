<!-- Vue Blade pour afficher les informations du profil -->
@extends('client.layout')

@section('content')


    <title>Profil</title>
    <style>
        /* Ajouter une classe spécifique pour centrer le contenu */
        .centered-container {
            background: url('/image/fruit-chocolate-cake-dessert-gourmet-advertising-powerpoint-background_a88cdc3b60__960_540.avif');


            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {

            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
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
        }

        p {
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
            max-width: 600px;
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
            <p id="name">{{ $user->name }}</p>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <p id="email">{{ $user->email }}</p>
        </div>

        <div class="form-group">
            <label for="adress">Adresse :</label>
            <p id="adress">{{ $user->adress }}</p>
        </div>

        <div class="form-group">
            <label for="tele">Téléphone :</label>
            <p id="tele">{{ $user->tele }}</p>
        </div>

        <button type="button" onclick="openEditModal()">Modifier</button>
    </div>
</div>

<!-- Modal pour le formulaire de modification -->
<div id="editProfileModal">
    <div class="modal-card">
        <div class="modal-close" onclick="closeEditModal()">×</div>
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="adress">Adresse :</label>
                <input type="text" id="adress" name="adress" value="{{ $user->adress }}">
            </div>

            <div class="form-group">
                <label for="tele">Téléphone :</label>
                <input type="text" id="tele" name="tele" value="{{ $user->tele }}">
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



@endsection
