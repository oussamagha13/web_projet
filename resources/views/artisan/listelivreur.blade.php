@extends('artisan.layout')

@section('content')
<section class="products">
    <h1 class="title"> Choix <span>Livreur</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    @foreach ($livreurs as $livreur)
    <div class="commande">

        <img src="{{ asset('image/74181848-icône-livreur-plat.jpg') }}" alt="Image du produit" class="img-fluid rounded">


        <div class="info">

            <form id="cartForm" action="{{ route('livreur.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id_commande" value="{{ $id_commande }}">
               <input type="hidden" name="id_livreur" value="{{ $livreur->id }}">

            <h3>Nom du Livreur : <input type="texte" name="nomproduit" value="{{ $livreur->name }}" class="form-control" readonly> </h3><br>
            <p>Adresse du Livreur :  <input type="texte" name="prix" value="{{ $livreur->adress }}" class="form-control" readonly> </p><br>

            <button type="submit" class="btn btn-primary">Choisi ce Livreur</button><br>
            <br>

            </form>

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
.title span{
    color: #c2b3b3;
    padding-left: .7rem;
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
