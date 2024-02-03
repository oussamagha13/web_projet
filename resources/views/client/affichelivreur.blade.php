@extends('client.layout')

@section('content')
    <title>Client</title>
    <section class="products">
        <h1 class="title"> Info sur Livreur <span></span> <a href="#"> >></a> </h1>

    <div class="conteneur-commandes">
        @foreach ($livreur as $pcommande)
            <div class="commande">
                <img src="{{ asset('image/74181848-icône-livreur-plat.jpg') }}" alt="Image du livreur" class="img-fluid rounded">
                <div class="info">
                    <table>
                        <tr>
                            <td><h3>Nom :</h3></td>
                            <td><input type="text" name="nomproduit" value="{{ $pcommande->name }}" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td><p>Adresse :</p></td>
                            <td><input type="text" name="adresse" value="{{ $pcommande->adress }}" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td><p>Téléphone :</p></td><br>
                            <td><input type="text" name="telephone" value="{{ $pcommande->tele }}" class="form-control" readonly></td>
                        </tr>

                    </table>
                    <br>

                    <div class="stars">


                        @if ($eval->count() > 0)
<h3>Évaluations :</h3>


<!-- Afficher la moyenne des évaluations sous forme d'étoiles -->
@php
    $averageRating = $eval->avg('rating');
@endphp

<div>

    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= round($averageRating))
            <span class="fas fa-star"></span>
        @else
            <span class="far fa-star"></span>
        @endif
    @endfor
</div>

@else
<h3>Évaluations :</h3>
<span class="far fa-star"></span>
<span class="far fa-star"></span>
<span class="far fa-star"></span>
<span class="far fa-star"></span>
<span class="far fa-star"></span>
@endif


                    </div><br>



                    <a href="#"  onclick="showEvaluationForm('{{ $pcommande->name }}', '{{ $pcommande->prix }}', '{{ $pcommande->id }}', '{{ $pcommande->id_art }}')">
                        <button type="submit" class="action-btn supprimer-btn2">
                            Evaluer Livreur
                        </button>
                    </a>


                </div>
            </div>
        @endforeach
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

.products{
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
background-color: #603506;
}
.supprimer-btn2 {
background-color: #0050a0;
}
.supprimer-btn:focus {
border-color: #e5e4e2c5;
outline: none; /* Supprime l'outline par défaut */
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
.supprimer-btn {
background-color: #e32f2f;
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







    <!-- Ajoutez ces lignes dans la section scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    <script>


        function showEvaluationForm(name, price, id_produit, id_art) {
            // Utilisation de SweetAlert pour créer un formulaire moderne
            Swal.fire({
                title: '<h3>Évaluez le Livreur</h3>',
                html: `
                <form action="{{ route('evaluations.store') }}" method="POST">
    @csrf

    <div>
        <input type="hidden" name="id_produit" value="${id_produit}">

        <div class="rating-container">
            <span class="star" onclick="handleStarClick(1)">&#9733;</span>
            <span class="star" onclick="handleStarClick(2)">&#9733;</span>
            <span class="star" onclick="handleStarClick(3)">&#9733;</span>
            <span class="star" onclick="handleStarClick(4)">&#9733;</span>
            <span class="star" onclick="handleStarClick(5)">&#9733;</span>
        </div>
        <input type="hidden" id="ratingInput" name="rating" value="0">
        <label for="comment" class="form-label">Commentaire</label>
        <textarea name="comment" id="comment" rows="4" class="form-textarea"></textarea>

        <button type="submit" class="submit-btn">Soumettre l'évaluation</button>
    </div>
</form>


                `,
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Logique à exécuter avant de soumettre le formulaire
                    // Vous pouvez ajouter du code ici si nécessaire
                }
            });
        }
    </script>

<script>
    function handleStarClick(rating) {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        resetStars();

        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('active');
        }

        ratingInput.value = rating;
    }

    function resetStars() {
        const stars = document.querySelectorAll('.star');

        stars.forEach((star) => {
            star.classList.remove('active');
        });
    }
</script>



<style>
     .form-label {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }

        .form-textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #2186c4;
        }
 .rating-container {
            display: flex;
            flex-direction: row;
            font-size: 24px;
        }

        .star {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        .star.active {
            color: gold;
        }

        .submit-btn {
            margin-top: 10px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
        }
</style>

@endsection
