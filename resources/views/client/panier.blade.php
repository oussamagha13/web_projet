@extends('client.layout')

@section('content')
<title>Mon Panier</title>

<section class="products">
    <h1 class="title"> Mon <span> Panier </span> <a href="#"> >></a> </h1>
    @foreach ($paniers as $commande)

    <div class="modal-content" style="border-block-start: #ddd; float: left;">

         <div class="commande-container">
            <div class="commande-box">
                <h1>Commande </h1>

                <form id="cartForm" action="{{ route('commande.store' )}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $commande->id }}">
                <table>

                <tr><td><h2>Nom du produit:</h2> </td><td><input type="texte" name="nomproduit" value="{{ $commande->nomproduit }}" class="my-input" readonly size="10"> </td></tr>
                <tr><td><h2>Prix du produit:  </h2></td><td><input type="texte" name="prix" value="{{ $commande->prix }}" class="my-input" readonly size="10"> </td></tr>
                <tr><td><h2>Quantite:  </h2>  </td><td> <input type="texte" name="quantite" value="{{ $commande->quantite }}" class="my-input" size="10"></td></tr>
                <tr><td><h2>Date: </h2></td><td><input type="texte" name="date" value="{{ $commande->date }}" class="my-input" readonly size="10"> </td></tr></table>
                <input type="hidden" name="id_produit" value="{{ $commande->id_produit }}">
                <input type="hidden" name="id_art" value="{{ $commande->id_art }}"><br>
                <button type="submit" class="btn btn-primary">Commander</button><br>
                <br>

                </form>

            </div>







        </div>
        <form action="{{ route('supprimerPanier', ['id' => $commande->id]) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn supprimer-btn">
                Supprimer
            </button>
        </form>
</div>
@endforeach








<style>
    .title {
    display:flex;
    align-items: center;
    font-size: 2.5rem;
    margin-bottom:3rem;
    padding:1.2rem 0;
    border-bottom: 0.1rem solid rgba(9, 9, 9, 0.7);
    color: #1b1919;
}
.title span{
    color: #3b3737cb;
    padding-left: .7rem;
}

body{
    background: url('/image/home-bg1.jpg');
     background-size: cover;
}
/* Ajoutez ces styles à votre balise <style> existante dans le fichier mes_commandes.blade.php */
    .modal-content{
        background-color: #ffffff80;
        border-radius: 20px;
        transition: transform 0.5s ease;
        margin-left: 0.5cm;
    }
    .modal-content:hover {
    transform: scale(1.1); /* L'élément sera agrandi 20% lorsqu'il est survolé */
}
.commande-container{
    background-color: rgba(255, 106, 0, 0.1);

}
.modal {
    float: left;
    overflow-y: auto;
    max-height: 50vh; /* Ajustez la hauteur maximale selon vos besoins */
    position: fixed;
    top: 30%; /* Position centrale verticale */
    left: 30%; /* Position centrale horizontale */
    transform: translate(-50%, -50%); /* Centrage absolu */
}

.commande-container {
    float: left;
    display: flex;
    justify-content: space-between;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 5px;
    border-radius: 5px;
}

.commande-actions {
    display: flex;
    gap: 10px;
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
    background-color: #0a487b;
}

.modifier-btn {
    background-color: #05a648;
}
.modifier-btn:focus {
border-color: #e5e4e2c5;
outline: none; /* Supprime l'outline par défaut */
}

.supprimer-btn {
    background-color: #e3342f;
}
.supprimer-btn:focus {
border-color: #e5e4e2c5;
outline: none; /* Supprime l'outline par défaut */
}
.my-input{
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
.my-input:focus {
border-color: #e87e22c5;
outline: none; /* Supprime l'outline par défaut */
}

</style>

@endsection


