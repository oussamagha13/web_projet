@extends('acceuil.layout')

@section('content')
<section class="products">
    <h1 class="title">Carateristique sur <span>L'Artisan</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    @foreach ($resultats as $resultat)
    <div class="commande">

        <img src="{{ asset('image/pngegg.png') }}" alt="Image du produit" class="img-fluid rounded">

        <div class="info">
           <table>
           <tr><td> <h3> Nom d Artisan : </h3></td><td><input type="text" name="nomproduit" value="{{ $resultat->name }}" class="form-control" readonly></td></tr>
           <tr><td><p> Adress : </p></td><td><input type="text" name="prix" value="{{ $resultat->adress }}" class="form-control" readonly></td></tr>
           <tr><td><p> tele : </p></td><td><input type="text" name="prix" value="{{ $resultat->tele }}" class="form-control" readonly></td></tr>
           <tr><td><p> Heure d'Ouverture : </p></td><td><input type="text" name="prix" value="{{ $resultat->heure_douverture }}" class="form-control" readonly></td></tr>

           </table>


        </div>



    </div>
    @endforeach
</div>
</section>

<h1 class="title" style="margin-left: 140px;"> les Produits <span> d'Artisan</span> <a href="#"> >></a> </h1>
<div class="box-container" style="margin-top: 0px;">

    <div class="box" style="margin-top: 0px;">



        <div style="margin-top: 0px; margin-left: 30px;">
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <section class="products">
            <div class="box-container">
                @foreach ($produits as $item)
                    <div class="box">
                        <div class="icons">
                            <!-- Lien pour afficher le formulaire moderne -->
                            <a href="{{ route('login') }}" class="fas fa-shopping-cart" ></a>

                            <a href="" class="fas fa-eye"></a>

                            <a href="{{ route('login') }}" class="fas fa-star"></a>

                            <div class="actions">

                            </div>
                        </div>

                        <div class="img" style="text-align: center;">
                            <img decoding="async" src="{{ asset('images/' . $item->image) }}" alt="">
                        </div>
                        <div class="content">
                            <h3> nom : {{ $item->name }}</h3>
                            <div class="price"> Prix :{{ $item->prix }}</div>
                            <div class="price">Quantite :{{ $item->quantite }}</div>
                            <div class="stars">

                                @if ($item->evaluations->count() > 0)
                                <h3>Évaluations :</h3>


                                <!-- Afficher la moyenne des évaluations sous forme d'étoiles -->
                                @php
                                    $averageRating = $item->evaluations->avg('rating');
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

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Section pour afficher le formulaire moderne -->
        <div id="cartFormContainer" class="cart-form-container">

        </div>
    </div>
</div>
<style>
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

@endsection
